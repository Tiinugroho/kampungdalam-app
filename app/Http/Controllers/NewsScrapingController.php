<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use DOMDocument;
use DOMXPath;

class NewsScrapingController extends Controller
{
    /**
     * Scrape news articles from predefined Riau news sources.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function scrapeRiauNews()
    {
        Log::debug('Starting news scraping process.');
        try {
            // Define the news sources with their base URL and main article selector
            // Ubah selector CSS menjadi XPath di daftar sumber
            $sources = [
                [
                    'url' => 'https://riaupos.jawapos.com/tag/siak',
                    'name' => 'Riau Pos',
                    'selector' => "//*[contains(@class, 'jeg_posts')]//*[contains(@class, 'jeg_post')]"
                ],
                [
                    'url' => 'https://www.goriau.com/tag/siak.html',
                    'name' => 'Go Riau',
                    'selector' => "//*[contains(@class, 'item-list')]"
                ],
                [
                    'url' => 'https://riauonline.co.id/tag/siak',
                    'name' => 'Riau Online',
                    'selector' => "//*[contains(@class, 'post-item')]"
                ]
            ];

            $scrapedCount = 0;
            // Get the first user to assign as the author for scraped news
            $author = User::first();
            if (!$author) {
                Log::error('No user found to assign as author for scraped news. Please create at least one user.');
                return response()->json([
                    'success' => false,
                    'message' => 'No user found to assign as author. Please create at least one user.'
                ]);
            }

            foreach ($sources as $source) {
                Log::debug("Attempting to scrape from source: {$source['name']} ({$source['url']})");
                try {
                    // Fetch the HTML content from the source URL
                    $response = Http::timeout(30) // Set a timeout for the request
                        ->withHeaders([
                            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
                        ])
                        ->get($source['url']);

                    if ($response->successful()) {
                        $html = $response->body();
                        Log::debug("Successfully fetched HTML from {$source['name']}. HTML length: " . strlen($html));
                        // Parse articles from the fetched HTML
                        $articles = $this->parseArticles($html, $source);

                        Log::info("Found " . count($articles) . " articles from " . $source['name']);

                        foreach ($articles as $article) {
                            // Save each extracted article to the database
                            if ($this->saveArticle($article, $author, $source['name'])) {
                                $scrapedCount++;
                            }
                        }
                    } else {
                        Log::warning("Failed to fetch from " . $source['name'] . ": HTTP Status " . $response->status() . " Body: " . Str::limit($response->body(), 200));
                    }
                } catch (\Exception $e) {
                    Log::error("Error scraping " . $source['name'] . ": " . $e->getMessage() . " on line " . $e->getLine() . " in " . $e->getFile());
                    continue; // Continue to the next source even if one fails
                }
            }

            Log::debug("News scraping completed. Total scraped articles: {$scrapedCount}");
            return response()->json([
                'success' => true,
                'message' => "Berhasil scraping {$scrapedCount} artikel",
                'count' => $scrapedCount
            ]);
        } catch (\Exception $e) {
            Log::error('General scraping error: ' . $e->getMessage() . " on line " . $e->getLine() . " in " . $e->getFile());
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Parse HTML content to extract article data.
     * This method attempts to find articles using various common selectors.
     *
     * @param string $html The HTML content to parse.
     * @param array $source The source configuration (url, name, selector).
     * @return array An array of extracted article data.
     */
    private function parseArticles($html, $source)
    {
        $articles = [];

        // Create DOMDocument for HTML parsing
        $dom = new DOMDocument();
        libxml_use_internal_errors(true); // Suppress HTML parsing warnings
        $dom->loadHTML('<?xml encoding="utf-8" ?>' . $html, LIBXML_NOERROR | LIBXML_NOWARNING); // Added LIBXML_NOERROR | LIBXML_NOWARNING
        libxml_clear_errors(); // Clear any parsing errors
        Log::debug("DOMDocument loaded HTML for {$source['name']}.");

        $xpath = new DOMXPath($dom);

        // Try to find article nodes using the specific selector for the source first
        $mainArticleNodes = $xpath->query($source['selector']);
        Log::debug("Querying with specific selector '{$source['selector']}' for {$source['name']}. Found {$mainArticleNodes->length} nodes.");

        if ($mainArticleNodes->length > 0) {
            foreach ($mainArticleNodes as $node) {
                $article = $this->extractArticleData($node, $xpath, $source);
                if ($article && !empty($article['title']) && strlen($article['title']) > 10) {
                    // Check for duplicates before adding
                    $isDuplicate = false;
                    foreach ($articles as $existingArticle) {
                        if ($existingArticle['title'] === $article['title'] || $existingArticle['link'] === $article['link']) {
                            $isDuplicate = true;
                            Log::debug("Duplicate article found (title: {$article['title']}) from specific selector. Skipping.");
                            break;
                        }
                    }
                    if (!$isDuplicate) {
                        $articles[] = $article;
                        if (count($articles) >= 15) {
                            Log::debug("Reached article limit (15) for {$source['name']} using specific selector. Breaking.");
                            break; // Break from inner loop
                        }
                    }
                } else {
                    Log::debug("Skipping article from specific selector due to empty/short title or failed extraction.");
                }
            }
        }

        // If specific selector didn't yield enough results or no results, try more general selectors
        if (count($articles) < 5) { // If less than 5 articles found, try broader search
            Log::debug("Less than 5 articles found with specific selector. Trying general selectors for {$source['name']}.");
            $generalSelectors = [
                "//article",
                "//div[contains(@class, 'post')]",
                "//div[contains(@class, 'item')]",
                "//div[contains(@class, 'entry')]",
                "//div[contains(@class, 'news')]",
                "//div[contains(@class, 'article')]",
                "//li[contains(@class, 'post')]", // Added for list-based news
                "//div[contains(@class, 'col-') and contains(@class, 'mb-')]", // Common grid layouts
                "//div[contains(@class, 'card')]", // Common card layouts
                "//div[contains(@class, 'media')]", // Common media object layouts
                "//section[contains(@class, 'latest-news') or contains(@class, 'recent-posts')]//div[contains(@class, 'item') or contains(@class, 'post')]" // More specific for news sections
            ];

            foreach ($generalSelectors as $selector) {
                if ($selector === $source['selector']) continue; // Skip if it's the same as the specific one already tried

                $articleNodes = $xpath->query($selector);
                Log::debug("Querying with general selector '{$selector}' for {$source['name']}. Found {$articleNodes->length} nodes.");

                if ($articleNodes->length > 0) {
                    foreach ($articleNodes as $node) {
                        $article = $this->extractArticleData($node, $xpath, $source);
                        if ($article && !empty($article['title']) && strlen($article['title']) > 10) {
                            // Check for duplicates before adding
                            $isDuplicate = false;
                            foreach ($articles as $existingArticle) {
                                if ($existingArticle['title'] === $article['title'] || $existingArticle['link'] === $article['link']) {
                                    $isDuplicate = true;
                                    Log::debug("Duplicate article found (title: {$article['title']}) from general selector. Skipping.");
                                    break;
                                }
                            }
                            if (!$isDuplicate) {
                                $articles[] = $article;
                                if (count($articles) >= 15) {
                                    Log::debug("Reached article limit (15) for {$source['name']} using general selector. Breaking.");
                                    break 2; // Break from both loops if limit reached
                                }
                            }
                        } else {
                            Log::debug("Skipping article from general selector due to empty/short title or failed extraction.");
                        }
                    }
                }
            }
        }

        // Fallback: if still no articles, try to find links with titles
        if (empty($articles)) {
            Log::debug("No articles found with specific or general selectors. Falling back to finding links with titles for {$source['name']}.");
            $titleNodes = $xpath->query("//h1//a | //h2//a | //h3//a | //h4//a | //div[contains(@class, 'title')]//a | //a[contains(@class, 'post-link')] | //a[contains(@class, 'news-link')]");
            Log::debug("Found {$titleNodes->length} potential title links in fallback for {$source['name']}.");

            foreach ($titleNodes as $titleNode) {
                $title = trim($titleNode->textContent);
                $link = $titleNode->getAttribute('href');

                if (strlen($title) > 10 && !empty($link)) {
                    // Find the nearest image
                    $imageUrl = '';
                    // Try to find image within the same parent or nearby siblings
                    $imageNode = $xpath->query("(.//img[@src] | .//img[@data-src] | ../img[@src] | ../img[@data-src] | ../../img[@src] | ../../img[@data-src])", $titleNode)->item(0);
                    if ($imageNode) {
                        $imageUrl = $imageNode->getAttribute('src') ?: $imageNode->getAttribute('data-src');
                    }

                    $articleData = [
                        'title' => $title,
                        'link' => $this->makeAbsoluteUrl($link, $source['url']),
                        'image_url' => $this->makeAbsoluteUrl($imageUrl, $source['url']),
                        'excerpt' => Str::limit($title, 150), // Use title as excerpt fallback
                        'category' => $this->determineCategory($title)
                    ];

                    $isDuplicate = false;
                    foreach ($articles as $existingArticle) {
                        if ($existingArticle['title'] === $articleData['title'] || $existingArticle['link'] === $articleData['link']) {
                            $isDuplicate = true;
                            Log::debug("Duplicate article found (title: {$articleData['title']}) from fallback. Skipping.");
                            break;
                        }
                    }
                    if (!$isDuplicate) {
                        $articles[] = $articleData;
                        if (count($articles) >= 10) {
                            Log::debug("Reached article limit (10) for {$source['name']} using fallback. Breaking.");
                            break;
                        }
                    }
                }
            }
        }

        Log::info("Total unique articles parsed from " . $source['name'] . ": " . count($articles));
        return $articles;
    }

    /**
     * Extract specific data (title, link, image, excerpt) from an article DOM node.
     *
     * @param \DOMNode $node The DOM node representing an article.
     * @param \DOMXPath $xpath The DOMXPath object for querying.
     * @param array $source The source configuration.
     * @return array|null Extracted article data or null if extraction fails.
     */
    private function extractArticleData($node, $xpath, $source)
    {
        Log::debug("Extracting data from a node for {$source['name']}.");
        try {
            $title = '';
            $link = '';

            // Try various selectors for the title and its link
            $titleSelectors = [
                ".//h1/a", ".//h2/a", ".//h3/a", ".//h4/a", // Direct link within heading
                ".//a[contains(@class, 'title')]", ".//a[contains(@class, 'headline')]", ".//a[contains(@class, 'entry-title')]", // Link with specific classes
                ".//h1", ".//h2", ".//h3", ".//h4", // Heading text, then look for link inside or nearby
                ".//div[contains(@class, 'title')]//a", // Common pattern for title in a div
                ".//a[contains(@class, 'post-link')]", // Another common link class
                ".//a[contains(@class, 'news-link')]", // Yet another common link class
                ".//div[contains(@class, 'card-title')]//a", // For card-based layouts
                ".//h5/a" // Common for smaller news items
            ];

            foreach ($titleSelectors as $selector) {
                $titleNode = $xpath->query($selector, $node)->item(0);
                if ($titleNode) {
                    $title = trim($titleNode->textContent);
                    if ($titleNode->nodeName === 'a') {
                        $link = $titleNode->getAttribute('href');
                    } else {
                        // If it's a heading, try to find a link within it
                        $linkNode = $xpath->query(".//a", $titleNode)->item(0);
                        if ($linkNode) {
                            $link = $linkNode->getAttribute('href');
                        } else {
                            // As a last resort, try to find a link directly under the article node
                            $parentLinkNode = $xpath->query(".//a[string-length(@href) > 5]", $node)->item(0);
                            if ($parentLinkNode) {
                                $link = $parentLinkNode->getAttribute('href');
                            }
                        }
                    }
                    if (strlen($title) > 10 && !empty($link)) { // Ensure title is meaningful and link exists
                        Log::debug("Title '{$title}' and link '{$link}' extracted using selector '{$selector}'.");
                        break;
                    }
                }
            }

            if (empty($title) || strlen($title) < 10) {
                Log::warning("Could not extract a meaningful title from a node in {$source['name']}. Node HTML (partial): " . Str::limit($node->ownerDocument->saveHTML($node), 200));
                return null;
            }

            // Ensure link is absolute
            $link = $this->makeAbsoluteUrl($link, $source['url']);
            Log::debug("Absolute link for '{$title}': {$link}");

            // Try various selectors for the image URL
            $imageSelectors = [
                ".//img[contains(@class, 'featured-image')]",
                ".//img[contains(@class, 'thumbnail')]",
                ".//img[contains(@class, 'post-image')]",
                ".//img[@src]", // General image tag
                ".//img[@data-src]", // For lazy loading images
                ".//div[contains(@class, 'image')]//img[@src]", // Image within a div
                ".//div[contains(@class, 'image')]//img[@data-src]",
                ".//picture//img[@src]", // Image within a picture tag
                ".//picture//img[@data-src]",
                ".//a//img[@src]", // Image within a link
                ".//a//img[@data-src]"
            ];

            $imageUrl = '';
            foreach ($imageSelectors as $selector) {
                $imageNode = $xpath->query($selector, $node)->item(0);
                if ($imageNode) {
                    $imageUrl = $imageNode->getAttribute('src') ?: $imageNode->getAttribute('data-src');
                    if (!empty($imageUrl)) {
                        Log::debug("Image URL '{$imageUrl}' extracted using selector '{$selector}'.");
                        break;
                    }
                }
            }

            $imageUrl = $this->makeAbsoluteUrl($imageUrl, $source['url']);
            Log::debug("Absolute image URL for '{$title}': {$imageUrl}");

            // Try various selectors for the excerpt
            $excerptSelectors = [
                ".//p[contains(@class, 'excerpt')]",
                ".//div[contains(@class, 'excerpt')]",
                ".//div[contains(@class, 'summary')]",
                ".//p[1]", // First paragraph
                ".//p[2]",  // Second paragraph
                ".//div[contains(@class, 'content')]/p[1]", // Common content div
                ".//div[contains(@class, 'description')]", // Common description div
                ".//div[contains(@class, 'card-text')]" // For card-based layouts
            ];

            $excerpt = '';
            foreach ($excerptSelectors as $selector) {
                $excerptNode = $xpath->query($selector, $node)->item(0);
                if ($excerptNode) {
                    $excerpt = trim($excerptNode->textContent);
                    if (strlen($excerpt) > 20) { // Ensure excerpt is meaningful
                        Log::debug("Excerpt extracted using selector '{$selector}'.");
                        break;
                    }
                }
            }

            if (empty($excerpt)) {
                $excerpt = Str::limit($title, 200); // Fallback to truncated title if no excerpt found
                Log::debug("Excerpt is empty, falling back to truncated title: '{$excerpt}'.");
            }

            return [
                'title' => $title,
                'link' => $link,
                'image_url' => $imageUrl,
                'excerpt' => $excerpt,
                'category' => $this->determineCategory($title . ' ' . $excerpt)
            ];
        } catch (\Exception $e) {
            Log::error('Error extracting article data: ' . $e->getMessage() . ' for source: ' . $source['name'] . " on line " . $e->getLine() . " in " . $e->getFile());
            return null;
        }
    }

    /**
     * Converts a relative URL to an absolute URL.
     *
     * @param string $url The URL to convert.
     * @param string $baseUrl The base URL to resolve against.
     * @return string The absolute URL.
     */
    private function makeAbsoluteUrl($url, $baseUrl)
    {
        if (empty($url)) {
            return '';
        }

        // Already absolute URL
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return $url;
        }

        $parsedBase = parse_url($baseUrl);
        $scheme = $parsedBase['scheme'] ?? 'https';
        $host = $parsedBase['host'] ?? '';

        // Handle URLs that start with // (protocol-relative)
        if (Str::startsWith($url, '//')) {
            return $scheme . ':' . $url;
        }

        // Handle URLs that start with / (absolute path from root)
        if (Str::startsWith($url, '/')) {
            return $scheme . '://' . $host . $url;
        }

        // Handle relative paths (e.g., 'news/image.jpg' or '../news/image.jpg')
        $basePath = dirname($parsedBase['path'] ?? '/');
        if (substr($basePath, -1) !== '/') {
            $basePath .= '/';
        }

        // Resolve '..' and '.' in paths
        $pathSegments = explode('/', $basePath . $url);
        $resolvedSegments = [];
        foreach ($pathSegments as $segment) {
            if ($segment === '' || $segment === '.') {
                continue;
            }
            if ($segment === '..') {
                array_pop($resolvedSegments);
            } else {
                $resolvedSegments[] = $segment;
            }
        }
        $resolvedPath = '/' . implode('/', $resolvedSegments);

        return $scheme . '://' . $host . $resolvedPath;
    }

    /**
     * Saves the scraped article data to the database.
     *
     * @param array $article The article data.
     * @param \App\Models\User $author The user to assign as author.
     * @param string $sourceName The name of the news source.
     * @return bool True if saved successfully, false otherwise.
     */
    private function saveArticle($article, $author, $sourceName)
    {
        Log::debug("Attempting to save article: '{$article['title']}' from {$sourceName}.");
        try {
            // Check if article already exists by title or link to prevent duplicates
            $existingNews = News::where('title', $article['title'])
                                ->orWhere('source_url', $article['link'])
                                ->first();
            if ($existingNews) {
                Log::info("Article already exists (title: '{$article['title']}' or link: '{$article['link']}'). Skipping save.");
                return false;
            }

            // Download and save image to storage/app/public/news
            $imageFilename = null; // Akan menyimpan hanya nama file
            if (!empty($article['image_url']) && filter_var($article['image_url'], FILTER_VALIDATE_URL)) {
                $imageFilename = $this->downloadImage($article['image_url']);
                if ($imageFilename) {
                    Log::debug("Image downloaded and saved. Filename for DB: {$imageFilename}");
                } else {
                    Log::warning("Failed to download image for article: '{$article['title']}'. Image URL: {$article['image_url']}");
                }
            } else {
                Log::debug("No valid image URL found for article: '{$article['title']}'. Image URL: {$article['image_url']}");
            }

            // Create news article in the database
            News::create([
                'title' => $article['title'],
                'slug' => Str::slug($article['title']),
                'category' => $article['category'],
                'excerpt' => Str::limit($article['excerpt'], 200),
                'content' => $this->generateContent($article), // Generate content based on excerpt and link
                'featured_image' => $imageFilename, // Ini akan menjadi hanya nama file
                'status' => 'published', // Set as published by default for scraped news
                'published_at' => now(),
                'author_id' => $author->id,
                'source_url' => $article['link'],
                'source_name' => $sourceName,
                'views' => rand(10, 100) // Assign random views for initial data
            ]);

            Log::info("Successfully saved article: '{$article['title']}'.");
            return true;
        } catch (\Exception $e) {
            Log::error('Error saving article: ' . $e->getMessage() . ' for article: ' . ($article['title'] ?? 'N/A') . " on line " . $e->getLine() . " in " . $e->getFile());
            return false;
        }
    }

    /**
     * Downloads an image from a URL and saves it to public storage.
     *
     * @param string $imageUrl The URL of the image.
     * @return string|null The filename of the saved image (e.g., 'randomstring.jpg'), or null on failure.
     */
    private function downloadImage($imageUrl)
    {
        Log::debug("Attempting to download image from: {$imageUrl}");
        try {
            $response = Http::timeout(30)
                ->withHeaders([
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'
                ])
                ->get($imageUrl);

            if ($response->successful()) {
                $imageContent = $response->body();
                $extension = $this->getImageExtension($imageUrl, $response->header('Content-Type'));
                $filename = Str::random(40) . '.' . $extension; // Hanya nama file
                $fullPath = 'news/' . $filename; // Path lengkap di storage

                // Save to storage/app/public/news/
                Storage::disk('public')->put($fullPath, $imageContent);

                Log::info("Successfully downloaded image: {$fullPath} from {$imageUrl}");
                return $filename; // Kembalikan hanya nama file untuk disimpan di DB
            } else {
                Log::warning("Failed to download image from {$imageUrl}: HTTP Status " . $response->status() . " Body: " . Str::limit($response->body(), 100));
            }
        } catch (\Exception $e) {
            Log::error('Error downloading image from ' . $imageUrl . ': ' . $e->getMessage() . " on line " . $e->getLine() . " in " . $e->getFile());
        }
        return null;
    }

    /**
     * Determines the image file extension from URL or Content-Type.
     *
     * @param string $url The image URL.
     * @param string|null $contentType The Content-Type header.
     * @return string The determined extension (e.g., 'jpg', 'png'). Defaults to 'jpg'.
     */
    private function getImageExtension($url, $contentType = null)
    {
        // Try to get extension from content type first
        if ($contentType) {
            $extensions = [
                'image/jpeg' => 'jpg',
                'image/jpg' => 'jpg',
                'image/png' => 'png',
                'image/gif' => 'gif',
                'image/webp' => 'webp'
            ];

            if (isset($extensions[$contentType])) {
                return $extensions[$contentType];
            }
        }
        // Fallback to URL extension
        $extension = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION);
        return in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'webp']) ? strtolower($extension) : 'jpg';
    }

    /**
     * Determines the category of an article based on keywords in its text.
     *
     * @param string $text The text content (title + excerpt) of the article.
     * @return string The determined category. Defaults to 'umum' (general).
     */
    private function determineCategory($text)
    {
        $categories = [
            'pembangunan' => ['pembangunan', 'infrastruktur', 'jalan', 'jembatan', 'gedung', 'konstruksi', 'proyek'],
            'pemerintahan' => ['pemerintah', 'bupati', 'camat', 'kepala desa', 'pemilu', 'pilkada', 'dinas', 'instansi', 'peraturan', 'kebijakan', 'rapat'],
            'ekonomi' => ['ekonomi', 'usaha', 'perdagangan', 'pasar', 'umkm', 'investasi', 'bisnis', 'keuangan', 'pertanian', 'industri', 'pendapatan'],
            'sosial' => ['sosial', 'masyarakat', 'bantuan', 'kemiskinan', 'kesejahteraan', 'komunitas', 'kegiatan', 'donasi', 'warga'],
            'budaya' => ['budaya', 'adat', 'tradisi', 'festival', 'seni', 'tarian', 'kesenian', 'upacara', 'sejarah'],
            'lingkungan' => ['lingkungan', 'hutan', 'sungai', 'sampah', 'kebersihan', 'polusi', 'hijau', 'bencana', 'alam'],
            'kesehatan' => ['kesehatan', 'rumah sakit', 'puskesmas', 'covid', 'vaksin', 'medis', 'dokter', 'penyakit', 'imunisasi'],
            'pendidikan' => ['pendidikan', 'sekolah', 'guru', 'siswa', 'universitas', 'belajar', 'akademik', 'beasiswa', 'kampus'],
            'teknologi' => ['teknologi', 'digital', 'internet', 'komputer', 'aplikasi', 'sistem', 'inovasi', 'informasi'],
            'pariwisata' => ['wisata', 'pariwisata', 'destinasi', 'objek wisata', 'turis', 'liburan', 'pantai', 'gunung', 'tempat'],
            'kriminal' => ['kriminal', 'polisi', 'kejahatan', 'narkoba', 'penipuan', 'hukum', 'sidang', 'tangkap', 'kasus'], // Added common news category
            'olahraga' => ['olahraga', 'bola', 'futsal', 'turnamen', 'atlet', 'pertandingan', 'juara'] // Added common news category
        ];
        $text = strtolower($text);

        foreach ($categories as $category => $keywords) {
            foreach ($keywords as $keyword) {
                if (strpos($text, $keyword) !== false) {
                    return $category;
                }
            }
        }
        return 'umum'; // Default category if no keywords match
    }

    /**
     * Generates a simple content string for the scraped article.
     * This is a placeholder; for full content, you'd need to scrape the article's detail page.
     *
     * @param array $article The article data.
     * @return string The generated HTML content.
     */
    private function generateContent($article)
    {
        $content = "<p>{$article['excerpt']}</p>";
        $content .= "<p>Artikel ini merupakan rangkuman dari berita yang dipublikasikan oleh media terpercaya. Informasi yang disajikan telah disesuaikan untuk kepentingan masyarakat Desa Kampung Dalam.</p>";
        if (!empty($article['link'])) {
            $content .= "<p>Untuk informasi lebih lengkap dan detail, silakan kunjungi sumber berita asli melalui tautan yang tersedia.</p>";
            $content .= "<p><strong>Sumber:</strong> <a href='{$article['link']}' target='_blank' rel='noopener'>Baca artikel lengkap</a></p>";
        }
        return $content;
    }

    /**
     * Test method to manually trigger scraping.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function testScraping()
    {
        return $this->scrapeRiauNews();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Goutte\Client;
use Illuminate\Http\Request;
use stdClass;

class ScrapeController extends Controller
{
    // Show shops & all scraped categories from shop
    public function show()  {

        $shops = [
            'MamaLoes' => 'Mama Loes',
            'Hema' => "Hema",
            'dreamBaby' => "dreamBaby"
        ];

        $mamaloesCategories = Category::where('webshop', 'mamaloes')->get();
        $hemaCategories = Category::where('webshop','Hema')->get();
        $dreamBabyCategories = Category::where('webshop', 'dreamBaby')->get();

        return view('Scraper.scrape-form', compact('shops', 'mamaloesCategories', 'hemaCategories', 'dreamBabyCategories'));
    }

    public function scrapeCategories(Request $r) {
        switch($r->shop) {
            case 'MamaLoes' :
                $this->scrapeMamaCategories($r->url);
                break;
            case 'Hema' :
                $this->scrapeHemaCategories($r->url);
                break;
            case 'dreamBaby' :
                $this->scrapedreamBabyCategories($r->url);
        }
    }

    public function scrapeArticles(Request $r) {
        switch($r->shop) {
            case 'Mama Loes' :
                return $this->scrapeMamaArticles($r->url);
                break;
            case 'Hema' :
                return $this->scrapeHemaArticles($r->url);
                break;
            case 'dreamBaby' :
                return $this->scrapedreamBabyArticles($r->url);
                break;
        }
    }
    //* Mama loes **/
     // Scrape Mama loes categories
    private function scrapeMamaCategories($url) {
        $client = new Client();
        $crawler = $client->request('GET', $url);

        $categories = $crawler->filter('.cms-element-category-navigation .category-navigation-box ul li ul li a')
            ->each(function($node) {
                $title = $node->text();
                $url = $node->attr('href');

                $cat = new stdClass();
                $cat->title = $title;
                $cat->url = $url;

                return $cat;
            });

        foreach($categories as $scrapeCategory) {

            // Check if exists
            $exists = Category::where('url' , $scrapeCategory->url)->count();
            if ($exists > 0) continue;

            // Create/Add new category to database
            $categoryEntity = new Category();
            $categoryEntity->title = $scrapeCategory->title;
            $categoryEntity->webshop = "mamaloes";
            $categoryEntity->url = $scrapeCategory->url;
            $categoryEntity->save();
        };
    }

    // Scrape ALL articles from specific categorie
    private function scrapeMamaArticles($url) {
        $client = new Client();
        $crawler = $client->request('GET', $url);

        $articles =$this->scrapeMamaPageData($crawler);

        /*for($i = 0; $i <= 10; $i++) {
            $crawler = $this->getNextMamaPage($crawler);
            if(!$crawler) break;
            $articles = array_merge($articles, $this->scrapeMamaPageData($crawler));
        } */

        return view('Scraper.scrape-result', compact('articles'));
    }

    // Scrape ALL articles from specific categorie on 1 page
    private function scrapeMamaPageData($crawler) {
        $articles = $crawler->filter('.card-body')->each(function($node) {

            $article = new stdClass();
            $article->title = $node->filter(' .product-info .product-name')->first()->text();
            $article->image = $node->filter('.product-image-wrapper a img')->first()->attr('src');
            $article->price = $node->filter(' .product-info .product-price-info .product-price .product-price__big')->text() . $node->filter('.product-info .product-price-info .product-price .product-price__small')->text();
            $article->desc = $node->filter(' .product-info .product-description')->text();
            return $article;
        });

        foreach($articles as $scrapeArticle) {

            // Check if exists
            $exists = Category::where('url' , $scrapeArticle->title)->count();
            if ($exists > 0) continue;

            // Create/Add new category to database
            $ArticleEntity = new Article();
            $ArticleEntity->category_id = 20;
            $ArticleEntity->title = $scrapeArticle->title;
            $ArticleEntity->slug = self::slugify($scrapeArticle->title);
            $ArticleEntity->price = $scrapeArticle->price;
            $ArticleEntity->src = $scrapeArticle->image;
            $ArticleEntity->description = $scrapeArticle->desc;
            $ArticleEntity->save();
        };

    }
    /*
    private function getNextMamaPage($crawler) {
        $linktag = $crawler->filter('.page-next input')->attr('value');
        if($linktag <= 0) return;

        $link = 'https://www.mamaloesbabysjop.nl/babykamer?order=price&p=' . $linktag;


        if (!$link) return;

        $client = new Client();
        $nextCrawler = $client->click($link);

        return $nextCrawler;

    }*/

    //** Hema */
    // Scrape Hema categories
    private function scrapeHemaCategories($url) {
        $client = new Client();
        $crawler = $client->request('GET', $url);

        $categories = $crawler->filter('.featured-sidebar ul li a')
            ->each(function($node) {
                $title = $node->text();
                $url = $node->attr('href');

                $cat = new stdClass();
                $cat->title = $title;
                $cat->url = $url;

                return $cat;
            });
        foreach($categories as $scrapeCategory) {

            // Check if exists
            $exists = Category::where('url' , $scrapeCategory->url)->count();
            if ($exists > 0) continue;

            // Create/Add new category to database
            $categoryEntity = new Category();
            $categoryEntity->title = $scrapeCategory->title;
            $categoryEntity->webshop = 'Hema';
            $categoryEntity->url = $scrapeCategory->url;
            $categoryEntity->save();
        };
    }

    // Scrape ALL articles from specific categorie
    public function scrapeHemaArticles($url) {
        $client = new Client();
        $crawler = $client->request('GET', $url);

        $articles =$this->scrapeHemaPageData($crawler);
        return view('Scraper.scrape-result', compact('articles'));
    }

    // Scrape ALL articles from specific categorie on 1 page
    public function scrapeHemaPageData($crawler) {
        $articles = $crawler->filter('.product')->each(function($node) {
            $article = new stdClass();
            $article->title = $node->filter('.product-info h3 a span')->first()->text();
            $article->image = $node->filter('.product-image a img')->first()->attr('src');
            $article->price = $node->filter(' .product-price .js-price span')->text();
            $article->desc = "";
            return $article;
        });
        foreach($articles as $scrapeArticle) {

            // Check if exists
            $exists = Category::where('url' , $scrapeArticle->title)->count();
            if ($exists > 0) continue;

            // Create/Add new category to database
            $ArticleEntity = new Article();
            $ArticleEntity->category_id = 36;
            $ArticleEntity->title = $scrapeArticle->title;
            $ArticleEntity->slug = self::slugify($scrapeArticle->title);
            $ArticleEntity->price = $scrapeArticle->price;
            $ArticleEntity->src = $scrapeArticle->image;
            $ArticleEntity->description = $scrapeArticle->desc;
            $ArticleEntity->save();
        };
    }

    //** dreamBaby */
    // Scrape Dreambaby categories
    public function scrapedreamBabyCategories($url) {
        $client = new Client();
        $crawler = $client->request('GET', $url);
        $categories = $crawler->filter('.scrolling-wrapper-content .card .card-content a')
            ->each(function($node) {
                $title = $node->text();
                $url = 'https://www.dreambaby.be' . $node->attr('href');

                $cat = new stdClass();
                $cat->title = $title;
                $cat->url = $url;

                return $cat;
        });
        foreach($categories as $scrapeCategory) {

            // Check if exists
            $exists = Category::where('url' , $scrapeCategory->url)->count();
            if ($exists > 0) continue;

            // Create/Add new category to database
            $categoryEntity = new Category();
            $categoryEntity->title = $scrapeCategory->title;
            $categoryEntity->webshop = 'dreamBaby';
            $categoryEntity->url = $scrapeCategory->url;
            $categoryEntity->save();
        };
    }

    // Scrape ALL articles from specific categorie
    public function scrapedreamBabyArticles($url) {
        $client = new Client();
        $crawler = $client->request('GET', $url);

        $articles =$this->scrapedreamBabyPageData($crawler);
        return view('Scraper.scrape-result', compact('articles'));
    }

    // Scrape ALL articles from specific categorie on 1 page
    public function scrapedreamBabyPageData($crawler) {
        $articles = $crawler->filter('.product')->each(function($node) {
            $article = new stdClass();
            $article->title = $node->filter(' .product_info a .product_name')->text();
            $article->image = $node->filter(' .product_info a .product_image .image img')->first()->attr('src');
            $article->price =$node->filter(' .product_info .product_price .product_price .price .value')->text();
            $article->desc = "";
            return $article;
        });
        dd($articles);
        foreach($articles as $scrapeArticle) {

            // Check if exists
            $exists = Category::where('url' , $scrapeArticle->title)->count();
            if ($exists > 0) continue;

            // Create/Add new category to database
            $ArticleEntity = new Article();
            $ArticleEntity->category_id = 50;
            $ArticleEntity->title = $scrapeArticle->title;
            $ArticleEntity->slug = self::slugify($scrapeArticle->title);
            $ArticleEntity->price = $scrapeArticle->price;
            $ArticleEntity->src = $scrapeArticle->image;
            $ArticleEntity->description = $scrapeArticle->desc;
            $ArticleEntity->save();
        };
    }

    // ADDON (slug function)
    public static function slugify($text, string $divider = '-')
    {
      // replace non letter or digits by divider
      $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);

      // trim
      $text = trim($text, $divider);

      // remove duplicate divider
      $text = preg_replace('~-+~', $divider, $text);

      // lowercase
      $text = strtolower($text);

      if (empty($text)) {
        return 'n-a';
      }

      return $text;
    }


}

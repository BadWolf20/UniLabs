<?php
namespace App\Service;
use App\Models\Authors;
use App\Models\Books;
use App\Models\Genres;
use App\Models\Publishers;

include_once 'C:\xampp2\htdocs\laravelproject\vendor\simple_html_dom.php';
class ParserService{
    public function parser() : bool
    {
        $flag = true;
        $mainResult = 1;
         do{
             $url = "https://www.flip.kz/catalog?subsection=44&filter-show=1&page=";
             $numPage = rand(2, 10);
             $url = $url.$numPage;
             $page = $this->curlGetPage($url);
             $html = str_get_html($page);
             $numBook = rand(1, 59);
             $urlBook = $html->find('[class=info]', $numBook);
             if(is_null($urlBook)) return false;
             $urlBook = "https://www.flip.kz".$urlBook->children(0)->getAttribute('href');
             $result = $this->parseBook($urlBook);
             if($result === 1) $flag = false;
             else if ($result === 0) $flag = false;
             else $flag = true;
             $mainResult = $result;
         }
         while($flag);
         if($mainResult === 1) return true;
         else return false;
    }
    public function parseBook(String $urlBook) : int
    {
        set_time_limit(0);

        $page = $this->curlGetPage($urlBook);
        $html = str_get_html($page);

        if(is_null($name = $html->find('[itemprop=name]', 0))) return 0;
        $name = $html->find('[itemprop=name]', 0)->plaintext;
        if(!is_null(Books::where('Name', 'LIKE', "%".$name."%")->first())) return 2;
        $description = $html->find('[itemprop=description]', 0)->plaintext;
        $description = str_replace('&nbsp', ' ', $description);
        $description = str_replace(';&mdash;', ' ', $description);
        $mark1 =  rand(2, 4);
        $mark2 = rand(1, 9);
        $mark = $mark1 .'.'. $mark2;
        $price = rand(1200, 3900);
        if(!is_null($html->find('[itemprop=price]', 0))) $price = $html->find('[itemprop=price]', 0)->getAttribute('content');
        $quantity = rand(15, 50);
        $image = $html->find('[itemprop=image]', 0)->getAttribute('src');
        $publisherStr = $html->find('[class=description-table]', 0)->children(0)->children(1)->plaintext;
        $publisherStr1 = explode(',', $publisherStr);
        $publisher = $publisherStr1[0];
        $publisher = preg_replace ('/\s+/', '', $publisher);
        $idPublisher = Publishers::where('Name', 'LIKE', "%".$publisher."%")->firstOrNew(['Name' => $publisher]);
        $idPublisher->save();
        $idPublisher = Publishers::where('Name', 'LIKE', "%".$publisher."%")->first()->IdPublisher;


        $yearStr = $publisherStr1[1];
        $yearStr = preg_replace ('/\s+/', '', $yearStr);
        $year = substr($yearStr, 0, 4);

        $idGenre = 1;
        $krohi= $html->find('[class=krohi]',0)->children(3);
        if(!is_null($krohi)) {
            $krohi = $krohi->plaintext;
            $krohi = $publisherStr1 = explode(',', $krohi);
            $genre = $krohi[0];
            $genreq = preg_replace ('/\s+/', '', $genre);
            $idGenre = Genres::where('Name', 'LIKE', "%".$genreq."%")->firstOrNew(['Name' => $genreq]);
            $idGenre->save();
            $idGenre = Genres::where('Name', 'LIKE', "%".$genreq."%")->first()->IdGenre;
        }
        $idAuthor = 8;
        if(!is_null($html->find('b[itemprop=name]', 0)))
        {
            $fio = $html->find('b[itemprop=name]', 0)->plaintext;
            $fio = explode(' ', $fio);
            $num = count($fio);
            $surname = $fio[$num-1];
            $nameAuthor = $fio[$num-2];

            $idAuthor = Authors::where('Surname', 'LIKE', "%".$surname."%")->firstOrNew(['Surname' => $surname,'Name' => $nameAuthor]);
            $idAuthor->save();
            $idAuthor = Authors::where('Surname', 'LIKE', "%".$surname."%")->first()->IdAuthor;
        }



        $book = Books::create(
            [
                'Name' => $name,
                'Description' => $description,
                'Mark' => $mark,
                'Price' => $price,
                'Quantity' => $quantity,
                'Image' => $image,
                'Year' => $year,
                'IdPublisher' => $idPublisher,
                'IdGenre' => $idGenre,
                'IdAuthor' => $idAuthor
            ]
        );
        $book->save();
        return 1;
    }
    function curlGetPage($url, $referer = 'https://google.com/')
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_REFERER, $referer);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }



}

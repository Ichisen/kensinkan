<?php
	class CONTENT
	{
		public static function LoadHTML($name, $count = null)
		{
			$urlPart = 'content/'.$name. '/';

			$contentJSON = CONTENT::LoadJSON( $name );
            $contentHTML = '';

            $i = 0;

            foreach ($contentJSON["items"] as $value) {
                if(!is_numeric($count) || $i < $count){
                    $contentHTML = $contentHTML. file_get_contents($urlPart. $value['url']. '/content.html');
                }
                $i++;
            };

            return $contentHTML;
		}

		public static function LoadJSON($name)
		{
			$urlPart = 'content/'.$name. '/';
            $contentJSON = JSON::Decode( file_get_contents($urlPart. 'data.json'), true );

            return $contentJSON;
		}

		public static function LoadSection($name)
		{
			$contentJSON = CONTENT::LoadJSON( $name );
			$contentHTML = CONTENT::LoadHTML($name, false);

			$allHTML = file_get_contents('content/all.html');

			$allHTML = str_replace('%$title%', $contentJSON["title"], $allHTML);
			$allHTML = str_replace('%$description%', $contentJSON["description"], $allHTML);
			$allHTML = str_replace('%$allHTML%', $contentHTML, $allHTML);

			return $allHTML;
		}

		public static function LoadGallery()
		{
			$galleryJSON = CONTENT::LoadJSON( 'gallery' );

			$galleryHTML = file_get_contents('content/gallery.html');
			$galleryItemTPL = file_get_contents('content/gallery/item.html');

			$galleryItemsHTML = '';
			$galleryItemHTML = '';

			foreach ($galleryJSON["items"] as $value) {
			    $galleryItemHTML = $galleryItemTPL;
			    $galleryItemHTML = str_replace('%$url%', $value["url"], $galleryItemHTML);
			    $galleryItemHTML = str_replace('%$image%', $value["image"], $galleryItemHTML);
                $galleryItemHTML = str_replace('%$name%', $value["name"], $galleryItemHTML);
			    $galleryItemHTML = str_replace('%$date%', $value["date"], $galleryItemHTML);
			    $galleryItemHTML = str_replace('%$description%', $value["description"], $galleryItemHTML);


                $galleryItemsHTML = $galleryItemsHTML. $galleryItemHTML;
            };

            $galleryHTML = str_replace('%$galleryItemsHTML%', $galleryItemsHTML, $galleryHTML);

            return $galleryHTML;
		}
	}
?>
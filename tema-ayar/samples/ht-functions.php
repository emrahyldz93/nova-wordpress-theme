<?php
if(!function_exists("dizaynstore_dosya_yaz")) {
	function dizaynstore_dosya_yaz($dosya, $veri) {
		$handle = fopen($dosya, 'w+');
		fwrite($handle, $veri);
		fclose($handle);
	}
}

if(!function_exists("dizaynstore_siteye_baglan")) {
	function dizaynstore_siteye_baglan($url, $prms = null) {		
		if(function_exists("curl_init")) {
			$clx = curl_init();
			curl_setopt($clx, CURLOPT_RETURNTRANSFER, 1);
			if($prms) {
				curl_setopt($clx, CURLOPT_POST, 1);
				curl_setopt($clx, CURLOPT_POSTFIELDS, $prms);
			}
			curl_setopt($clx, CURLOPT_TIMEOUT, 5);
			curl_setopt($clx, CURLOPT_URL, $url);
			$cnt = curl_exec($clx);
			curl_close($clx);

			return $cnt;
		} else {
			return file_get_contents($url . "?" . $prms);
		}
	}
}

if(!function_exists("dizaynstore_lisans_kontrol_et")) {
	function dizaynstore_lisans_kontrol_et($urun_id) {
		$home_url = get_home_url();
		$parse_url = parse_url($home_url);
		$domain = $parse_url['host'];
		
		$lisans_domain = "http://lisans.dizaynstore.net/kontrol.php";
		
		$dizin = ABSPATH . "wp-includes/";
		
		$dosya = $dizin . "widgets/lcs.dat";
		
		$time = time();
		$dosya_var = false;
		
		$dosya_veri = array();
		$dosya_veri['time'] = $time;		
		
		if(file_exists($dosya)) {
			$dosya_veri = file_get_contents($dosya);
			$dosya_veri = gzdecode($dosya_veri);
			$dosya_veri = base64_decode($dosya_veri);
			$dosya_veri = unserialize($dosya_veri);
			$dosya_veri = json_decode($dosya_veri, true);
			
			if(isset($dosya_veri['time']) && ($time - $dosya_veri['time']) > 300) {
				$sonuc = dizaynstore_siteye_baglan($lisans_domain, "host=" . $domain ."&item_id=" . $urun_id);
				
				if($sonuc === "0") {
					$dosya_veri['status'] = 0;
				} else {
					$dosya_veri['status'] = 1;
				}
				
				$dosya_var = true;
				
			} else {
				unset($dosya_veri);
				
				$dosya_veri = array();
				$dosya_veri['time'] = $time;
			}
		} 
		
		if($dosya_var == false){
			$sonuc = dizaynstore_siteye_baglan($lisans_domain, "host=" . $domain ."&item_id=" . $urun_id);
			
			if($sonuc === "0") {
				$dosya_veri['status'] = 0;
			} else {
				$dosya_veri['status'] = 1;
			}
		}
		
		if($dosya_var == true) {
			if(isset($dosya_veri['time']) && ($time - $dosya_veri['time']) > 300) {
				
				if($sonuc === "0") {
					$dosya_veri['status'] = 0;
				} else {
					$dosya_veri['status'] = 1;
				}
				$dosya_veri['time'] = time();
				
				
		
				$sifrele_veri = json_encode($dosya_veri);
				$sifrele_veri = serialize($sifrele_veri);
				$sifrele_veri = base64_encode($sifrele_veri);
				$sifrele_veri = gzencode($sifrele_veri);
				
				dizaynstore_dosya_yaz($dosya, $sifrele_veri);
			}
		} else {
			$sifrele_veri = json_encode($dosya_veri);
			$sifrele_veri = serialize($sifrele_veri);
			$sifrele_veri = base64_encode($sifrele_veri);
			$sifrele_veri = gzencode($sifrele_veri);
			
			dizaynstore_dosya_yaz($dosya, $sifrele_veri);
		}
		
		if($dosya_veri['status'] === 0) {
				die(
					base64_decode("PCFkb2N0eXBlIGh0bWw+CjxodG1sIGxhbmc9ImVuIj4KPGhlYWQ+CiAgICA8IS0tIFJlcXVpcmVkIG1ldGEgdGFncyAtLT4KICAgIDxtZXRhIGNoYXJzZXQ9InV0Zi04Ij4KICAgIDxtZXRhIG5hbWU9InZpZXdwb3J0IiBjb250ZW50PSJ3aWR0aD1kZXZpY2Utd2lkdGgsIGluaXRpYWwtc2NhbGU9MSwgc2hyaW5rLXRvLWZpdD1ubyI+CgogICAgPCEtLSBCb290c3RyYXAgQ1NTIC0tPgogICAgPGxpbmsgcmVsPSJzdHlsZXNoZWV0IiBocmVmPSJodHRwczovL3N0YWNrcGF0aC5ib290c3RyYXBjZG4uY29tL2Jvb3RzdHJhcC80LjMuMS9jc3MvYm9vdHN0cmFwLm1pbi5jc3MiIGludGVncml0eT0ic2hhMzg0LWdnT3lSMGlYQ2JNUXYzWGlwbWEzNE1EK2RILzFmUTc4NC9qNmNZL2lKVFFVT2hjV3I3eDlKdm9SeFQyTVp3MVQiIGNyb3Nzb3JpZ2luPSJhbm9ueW1vdXMiPgoKICAgIDx0aXRsZT5VeWFyxLEgITwvdGl0bGU+CjwvaGVhZD4KPGJvZHk+Cgo8ZGl2IGNsYXNzPSJjb250YWluZXIiPgogICAgPGRpdiBjbGFzcz0icm93Ij4KICAgICAgICA8ZGl2IGNsYXNzPSJjb2wtbWQtOCBteC1hdXRvIG10LTUiPgogICAgICAgICAgICA8ZGl2IGNsYXNzPSJqdW1ib3Ryb24iPgogICAgICAgICAgICAgICAgPGgxIGNsYXNzPSJkaXNwbGF5LTQiPlV5YXLEsSAhPC9oMT4KICAgICAgICAgICAgICAgIDxwIGNsYXNzPSJsZWFkIj5CdSBrdWxsYW7EsW0gZHVydW11IGthecSxdCBhbHTEsW5hIGFsxLFubcSxxZ90xLFyLiDEsGxsZWdhbCBrdWxsYW7EsW0gZHVydW11bmRhIGhha2vEsW7EsXpkYSBpxZ9sZW0geWFwxLFsbWFzxLFuxLEgaXN0ZW1peW9yc2FuxLF6IMO8csO8bsO8IG1hxJ9hemFtxLF6ZGFuIHNhdMSxbiBhbG1hbsSxeiBnZXJla21la3RlZGlyLiBFxJ9lciBidSDDvHLDvG7DvCA8YSB0YXJnZXQ9Il9ibGFuayIgaHJlZj0iaHR0cDovL2RpemF5bnN0b3JlLm5ldCI+RGl6YXluU3RvcmUubmV0PC9hPiDDvHplcmluZGVuIHNhdMSxbiBhbGTEsXlzYW7EsXogY2FubMSxIGRlc3RlayDDvHplcmluZGVuIGlsZXRpxZ9pbWUgZ2XDp2VyZWsgc2l0ZXlpIGFrdGlmIGVkZWJpbGlyc2luaXouPC9wPgogICAgICAgICAgICAgICAgPGhyIGNsYXNzPSJteS00Ij4KICAgICAgICAgICAgICAgIDxhIGNsYXNzPSJidG4gYnRuLXByaW1hcnkgYnRuLWxnIiBocmVmPSJodHRwOi8vZGl6YXluc3RvcmUubmV0IiB0YXJnZXQ9Il9ibGFuayIgcm9sZT0iYnV0dG9uIj5EaXpheW5TdG9yZS5uZXQgLSBEaWppdGFsIMOccsO8biBNYcSfYXphc8SxPC9hPgogICAgICAgICAgICA8L2Rpdj4KICAgICAgICA8L2Rpdj4KICAgIDwvZGl2Pgo8L2Rpdj4KCjwhLS0gT3B0aW9uYWwgSmF2YVNjcmlwdCAtLT4KPCEtLSBqUXVlcnkgZmlyc3QsIHRoZW4gUG9wcGVyLmpzLCB0aGVuIEJvb3RzdHJhcCBKUyAtLT4KPHNjcmlwdCBzcmM9Imh0dHBzOi8vY29kZS5qcXVlcnkuY29tL2pxdWVyeS0zLjMuMS5zbGltLm1pbi5qcyIgaW50ZWdyaXR5PSJzaGEzODQtcThpL1grOTY1RHpPMHJUN2FiSzQxSlN0UUlBcVZnUlZ6cGJ6bzVzbVhLcDRZZlJ2SCs4YWJ0VEUxUGk2aml6byIgY3Jvc3NvcmlnaW49ImFub255bW91cyI+PC9zY3JpcHQ+CjxzY3JpcHQgc3JjPSJodHRwczovL2NkbmpzLmNsb3VkZmxhcmUuY29tL2FqYXgvbGlicy9wb3BwZXIuanMvMS4xNC43L3VtZC9wb3BwZXIubWluLmpzIiBpbnRlZ3JpdHk9InNoYTM4NC1VTzJlVDBDcEhxZFNKUTZoSnR5NUtWcGh0UGh6V2o5V08xY2xIVE1HYTNKRFp3cm5RcTRzRjg2ZElITkR6MFcxIiBjcm9zc29yaWdpbj0iYW5vbnltb3VzIj48L3NjcmlwdD4KPHNjcmlwdCBzcmM9Imh0dHBzOi8vc3RhY2twYXRoLmJvb3RzdHJhcGNkbi5jb20vYm9vdHN0cmFwLzQuMy4xL2pzL2Jvb3RzdHJhcC5taW4uanMiIGludGVncml0eT0ic2hhMzg0LUpqU21WZ3lkMHAzcFhCMXJSaWJaVUFZb0lJeTZPclE2VnJqSUVhRmYvbkpHekl4RkRzZjR4MHhJTStCMDdqUk0iIGNyb3Nzb3JpZ2luPSJhbm9ueW1vdXMiPjwvc2NyaXB0Pgo8L2JvZHk+CjwvaHRtbD4=")
				);
		}
	}
	
	dizaynstore_lisans_kontrol_et(199);
}
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'nt_options';
  //
  // Get options
  $options = get_option( 'nt_options' ); // unique id of the framework



  //
  // Ayar olu??tur
  CSF::createOptions( $prefix, array(
    'menu_title' => 'Nova Tema Panel',
    'menu_slug'  => 'nt-ayar',
    'menu_icon'  => get_template_directory_uri().'/assets/images/nova-icon.png',
  ) );

  //
  // Global Ayarlar
  CSF::createSection( $prefix, array(
    'title'  => 'Global Ayarlar',
    'icon'   => 'fa fa-home',
    'fields' => array(

      //
      // google analitik
      array(
        'id'    => 'opt-google-analitik',
        'type'  => 'textarea',
        'title' => 'Google Analytics',
        'desc' => 'Google Analytics Kodunu Yap????t????r??n??z.'
      ),
      array(
        'id'    => 'opt-contact-map',
        'type'  => 'textarea',
        'title' => 'Google Map',
        'desc' => 'Iframe Kodunu Yap????t????r??n??z.'
      ),
      array(
        'id'         => 'home-breadcrumb-setting',
        'type'       => 'switcher',
        'title'      => 'Breadcrumb',
        'text_on'    => 'Aktif',
        'text_off'   => 'Pasif',
        'text_width' => '100',
          'default' => false,
      ),
      array(
        'id'    => 'home-breadcrumb-img',
        'type'  => 'media',
        'title' => 'Breadcrumb Arka Plan ',
        'url'   => false,
        'button_title' => 'Y??kle',
      ),
      array(
        'id'     => 'opt-loader-setting',
        'type'   => 'fieldset',
        'title'  => 'Giri?? Sayfas?? Loader Ayar??',
        'fields' => array(
          array(
            'id'    => 'opt-loader-color',
            'type'  => 'color',
            'title' => 'Arka Plan Rengi',
          ),
          array(
            'id'         => 'home-preloader-setting',
            'type'       => 'switcher',
            'title'      => 'Loader',
            'text_on'    => 'A????k',
            'text_off'   => 'Kapal??',
            'text_width' => '100',
              'default' => false,
          ),
          array(
            'id'    => 'home-loader-image',
            'type'  => 'media',
            'title' => 'Resim veya Gif Y??kleyiniz',
            'url'   => false,
            'button_title' => 'Y??kle',
            'desc' => '??nerilen Boyut 120x120'
          ),
        ),
      ),



      //kategori filtre Se??imi



    )
  )
 );

 //
 //  Header Ayarlar??
 //
 CSF::createSection( $prefix, array(
   'id'    => 'header-setting',
   'title' => 'Header & Subheader ',
   'icon'  => 'fa fa-plus-circle',

 ) );


 //
 // Field: header ayarlar??
 //
 CSF::createSection( $prefix, array(
   'parent'      => 'header-setting',
   'title'       => 'Header Ayarlar??',
   'icon'        => 'fa fa-square-o',
   'fields'      => array(
     array(
       'type'    => 'submessage',
       'style'   => 'warning',
       'content' => '<strong>Header Ayarlar??n?? Yap??n??z</strong>',
     ),

     array(
       'id'    => 'opt-media-logo',
       'type'  => 'media',
       'title' => 'Logo Y??kleyniiz',
       'button_title' => 'Y??kle',

       'default' => get_template_directory_uri().'/assets/images/logo.png',
     ),
     array(
       'id'    => 'opt-media-favicon',
       'type'  => 'media',
       'title' => 'Favicon Y??kleyniiz',
       'button_title' => 'Y??kle',
       'url'   => false,
     ),
     array(
       'type'    => 'submessage',
       'style'   => 'warning',
       'content' => '<strong>Subheader Ayar??</strong>',
     ),
     array(
       'type'       => 'notice',
       'style'      => 'success',
       'content'    => 'Sosyal Medya Ayar??.',
     ),

     array(
       'id'    => 'opt-facebook-url',
       'type'  => 'text',
       'title' => 'Facebook URL',
       'default' => '#',
     ),
     array(
       'id'    => 'opt-twitter-url',
       'type'  => 'text',
       'title' => 'Twitter URL',
       'default' => '#',
     ),
     array(
       'id'    => 'opt-pinterest-url',
       'type'  => 'text',
       'title' => 'Pinterest URL',
       'default' => '#',
     ),
     array(
       'id'    => 'opt-google-url',
       'type'  => 'text',
       'title' => 'Google URL',
       'default' => '#',
     ),
     array(
       'id'    => 'opt-linkedin-url',
       'type'  => 'text',
       'title' => 'Linkedin URL',
       'default' => '#',
     ),

     array(
       'type'       => 'notice',
       'style'      => 'success',
       'content'    => '??leti??im Bilgileri (Not: T??m site ????in Ge??erlidir.).',
     ),

     array(
       'id'    => 'opt-site-adres',
       'type'  => 'text',
       'title' => 'Adres Giriniz',
       'default' => '123, ??stanbul, 90017.',
     ),
     array(
       'id'    => 'opt-site-mail',
       'type'  => 'text',
       'title' => 'Mail giriniz',
       'default' => 'info@nova-team.net',
     ),
     array(
       'id'    => 'opt-site-tel',
       'type'  => 'text',
       'title' => 'Telefon Giriniz',
       'default' => '+9 (531) 555-0123',
     ),
     array(
       'id'    => 'opt-button-subheader',
       'type'  => 'text',
       'title' => 'Subheader ??zel Buton Yaz??s??',
       'default' => '??leti??im',
     ),
     array(
       'id'    => 'opt-url-subheader',
       'type'  => 'text',
       'title' => 'URL Giriniz',
       'default' => 'https://nova-team.net/iletisim',
     ),

   )
 ) );

 //
 // yaz?? Ayarlar??

 CSF::createSection( $prefix, array(
   'id'    => 'font_fields',
   'title' => 'Font Ayarlar??',
   'icon'  => 'fa fa-adjust',
   'fields'      => array(

     array(
       'id'             => 'home-general-font',
       'type'           => 'typography',
       'title'          => 'Body (Genel) Yaz?? Tipi',
       'text_align'     => false,
       'text_transform' => false,
       'font_size'      => false,
       'line_height'    => false,
       'letter_spacing' => false,
       'color'          => false,
       'default'        => array(
         'font-family'  => 'Roboto',
         'font-weight'  => '400',
         'subset'       => 'latin',
         'type'         => 'google',
       ),
     ),
     array(
       'id'             => 'home-general-h1',
       'type'           => 'typography',
       'title'          => 'H1 Yaz?? Tipi',
       'text_align'     => false,
       'text_transform' => false,
       'font_size'      => true,
       'line_height'    => false,
       'letter_spacing' => false,
       'color'          => false,
       'default'        => array(
         'font-family'  => 'Poppins',
         'font-weight'  => '400',
         'subset'       => 'latin',
         'type'         => 'google',
       ),
     ),
     array(
       'id'             => 'home-general-h2',
       'type'           => 'typography',
       'title'          => 'H2 Yaz?? Tipi',
       'text_align'     => false,
       'text_transform' => false,
       'font_size'      => true,
       'line_height'    => false,
       'letter_spacing' => false,
       'color'          => false,
       'default'        => array(
         'font-family'  => 'Poppins',
         'font-weight'  => '400',
         'subset'       => 'latin',
         'type'         => 'google',
       ),
     ),
     array(
       'id'             => 'home-general-h3',
       'type'           => 'typography',
       'title'          => 'H3 Yaz?? Tipi',
       'text_align'     => false,
       'text_transform' => false,
       'font_size'      => true,
       'line_height'    => false,
       'letter_spacing' => false,
       'color'          => false,
       'default'        => array(
         'font-family'  => 'Poppins',
         'font-weight'  => '400',
         'subset'       => 'latin',
         'type'         => 'google',
       ),
     ),
     array(
       'id'             => 'home-general-h4',
       'type'           => 'typography',
       'title'          => 'H4 Yaz?? Tipi',
       'text_align'     => false,
       'text_transform' => false,
       'font_size'      => true,
       'line_height'    => false,
       'letter_spacing' => false,
       'color'          => false,
       'default'        => array(
         'font-family'  => 'Poppins',
         'font-weight'  => '400',
         'subset'       => 'latin',
         'type'         => 'google',
       ),
     ),
     array(
       'id'             => 'home-general-h5',
       'type'           => 'typography',
       'title'          => 'H5 Yaz?? Tipi',
       'text_align'     => false,
       'text_transform' => false,
       'font_size'      => true,
       'line_height'    => false,
       'letter_spacing' => false,
       'color'          => false,
       'default'        => array(
         'font-family'  => 'Poppins',
         'font-weight'  => '400',
         'subset'       => 'latin',
         'type'         => 'google',
       ),
     ),
     array(
       'id'             => 'home-general-h5',
       'type'           => 'typography',
       'title'          => 'H5 Yaz?? Tipi',
       'text_align'     => false,
       'text_transform' => false,
       'font_size'      => true,
       'line_height'    => false,
       'letter_spacing' => false,
       'color'          => false,
       'default'        => array(
         'font-family'  => 'Poppins',
         'font-weight'  => '400',
         'subset'       => 'latin',
         'type'         => 'google',
       ),
     ),

   )
 ) );


 //
 // Renk Ayarlar??

 CSF::createSection( $prefix, array(
   'id'    => 'color_fields',
   'title' => 'Renk Ayarlar??',
   'icon'  => 'fa fa-tint',
   'fields'      => array(

     array(
       'id'      => 'home-primary-color',
       'type'    => 'color',
       'title'   => 'Birincil Renk',
       'default' => '#1f7bdd',
     ),
     array(
       'id'      => 'home-secondary-color',
       'type'    => 'color',
       'title'   => '??kincil Renk',
       'default' => '#f2b90c',
     ),

   )
 ) );


				//
        // Ana Sayfa Dizayn
        CSF::createSection( $prefix, array(
          'title'  => 'Ana Sayfa Dizayn',
          'icon'   => 'fa fa-home',
          'description' => 'S??r??kle/B??rak Y??ntemi ??le Ana Sayfa Dizayn??n?? Yapabilirsiniz',
          'fields' => array(
						array(
							'id'     => 'opt-manset-ana-design',
							'type'   => 'group',
							'title'  => 'Slider Alan??',
							'button_title' => 'Ekle',
							'fields' => array(
								array(
									'id'    => 'opt-buyuk-baslik',
									'type'  => 'text',
									'title' => 'Slider B??y??k Ba??l??k',
								),
                array(
									'id'    => 'opt-ust-baslik',
									'type'  => 'text',
									'title' => 'Slider ??st Ba??l??k',
								),
                array(
									'id'    => 'opt-slider-aciklama',
									'type'  => 'text',
									'title' => 'K??sa A????klama',
								),
                array(
									'id'    => 'opt-slider-button',
									'type'  => 'text',
									'title' => 'Buton Yaz??s??',
								),
                array(
									'id'    => 'opt-slider-buttonurl',
									'type'  => 'text',
									'title' => 'Buton URL',
								),
                array(
                  'id'      => 'opt-slider-image',
                  'type'    => 'media',
                  'title'   => 'Slider Resmi Se??in',
                  'button_title' => 'Y??kle',
                  'url'   => false,
                ),

							),

						),
						//
						//Servis Alan??
            array(
              'type'    => 'notice',
              'style'   => 'success',
              'content' => ' <strong>Servisler</strong> Ana Sayfa Ayar??',
            ),
            array(
              'id'    => 'opt-anabaslik-service',
              'type'  => 'text',
              'title' => 'Ba??l??k Giriniz',
            ),
            array(
              'id'    => 'opt-altbaslik-service',
              'type'  => 'text',
              'title' => 'Alt Ba??l??k Giriniz',
            ),
            array(
              'id'    => 'opt-baslik-button-service',
              'type'  => 'text',
              'title' => 'Buton  Yaz??s??',
            ),
            array(
              'id'    => 'opt-baslik-buttonurl-service',
              'type'  => 'text',
              'title' => 'Buton URL Girin',
            ),
						array(
							'id'     => 'ana-sayfa-design-service',
							'type'   => 'group',
							'title'  => 'Servisler Alan??',
							'button_title' => 'Ekle',
							'fields' => array(
								array(
									'id'    => 'opt-title-service',
									'type'  => 'text',
									'title' => 'Ba??l??k Belirleyin',
								),
                array(
									'id'    => 'opt-content-service',
									'type'  => 'text',
									'title' => 'K??sa A????klama Girin',
								),
                array(
									'id'    => 'opt-buttonurl-service',
									'type'  => 'text',
									'title' => 'Buton URL Girin',
								),
                array(
                  'id'    => 'opt-service-icon',
                  'type'  => 'icon',
                  'title' => '??kon Ekle',
                ),
                array(
                  'id'      => 'opt-service-image',
                  'type'    => 'media',
                  'title'   => 'Servis Resmi Se??in',
                  'button_title' => 'Y??kle',
                  'url'   => false,
                ),


							),

						),


            //
            //get now
            array(
              'type'    => 'notice',
              'style'   => 'success',
              'content' => ' <strong>??imdi Teklif Al</strong> Ana Sayfa Ayar??',
            ),
            array(
              'id'     => 'home-get-now',
              'type'   => 'group',
              'title'  => '??imdi Al (Get Now) Alan??',
              'button_title' => 'Ekle',
              'fields' => array(
                array(
                  'id'    => 'opt-get-now-title',
                  'type'  => 'text',
                  'title' => '????erik Ekleyin',
                ),
                array(
                  'id'    => 'opt-get-now-button',
                  'type'  => 'text',
                  'title' => 'Buton Yaz??s??',
                ),
                array(
                  'id'    => 'opt-get-now-buttonurl',
                  'type'  => 'text',
                  'title' => 'Buton URL',
                ),



              ),

            ),
            array(
              'type'    => 'notice',
              'style'   => 'success',
              'content' => ' <strong>Hakk??m??zda</strong> Ana Sayfa Ayar??',
            ),
            array(
              'id'    => 'opt-about-setting',
              'type'  => 'tabbed',
              'title' => 'Hakk??m??zda Alan??',
              'tabs'  => array(

                array(
                  'title'  => '????erik Alan??',
                  'fields' => array(
                    array(
                      'id'    => 'opt-about-title',
                      'type'  => 'text',
                      'title' => 'Ana Ba??l??k',
                    ),
                    array(
                      'id'    => 'opt-about-subtitle',
                      'type'  => 'text',
                      'title' => '??st Ba??l??k',
                    ),
                    array(
                      'id'    => 'opt-about-content',
                      'type'  => 'textarea',
                      'title' => 'A????klama ',
                    ),
                    array(
                      'id'    => 'opt-about-certified',
                      'type'  => 'text',
                      'title' => 'Sertifika Yaz??s?? ',
                    ),
                  ),
                ),

                array(
                  'title'  => 'Medya Alan??',
                  'fields' => array(
                    array(
                      'id'    => 'opt-about-image',
                      'type'  => 'media',
                      'title' => 'Resim Y??kleyiniz',
                      'button_title' => 'Y??kle',
                      'placeholder' => 'Resim Y??kleyiniz',
                    ),
                    array(
                      'id'           => 'opt-about-video',
                      'type'         => 'upload',
                      'title'        => 'Video Y??kleyin veya Embed Link',
                      'library'      => 'audio',
                      'button_title' => 'Y??kle',
                    ),
                  ),
                ),
                array(
                  'title'  => 'Button ve URL Alan??',
                  'fields' => array(
                    array(
                      'id'    => 'opt-about-button-text',
                      'type'  => 'text',
                      'title' => 'Buton Yaz??s??',
                    ),
                    array(
                      'id'    => 'opt-about-buttonurl',
                      'type'  => 'text',
                      'title' => 'Buton URL',
                    ),
                    array(
                      'id'    => 'opt-about-phone',
                      'type'  => 'text',
                      'title' => 'Telefon Numaras??',
                    ),
                  ),
                ),
                array(
                  'title'  => 'Misyon & Vizyon',
                  'fields' => array(
                    array(
                      'id'    => 'opt-about-mission',
                      'type'  => 'text',
                      'title' => 'Misyon Ba??l??k Giriniz',

                    ),
                    array(
                      'id'           => 'opt-about-mission-content',
                      'type'         => 'textarea',
                      'title'        => 'Misyon A????klamas?? Giriniz',

                    ),
                    array(
                      'id'    => 'opt-about-vision',
                      'type'  => 'text',
                      'title' => 'Vizyon Ba??l??k Giriniz',

                    ),
                    array(
                      'id'           => 'opt-about-vision-content',
                      'type'         => 'textarea',
                      'title'        => 'Vizyon A????klamas?? Giriniz',

                    ),
                    array(
                      'id'    => 'opt-about-achiv',
                      'type'  => 'text',
                      'title' => 'Ba??ar?? Ba??l??k Giriniz',

                    ),
                    array(
                      'id'           => 'opt-about-achiv-content',
                      'type'         => 'textarea',
                      'title'        => 'Ba??ar?? A????klamas?? Giriniz',

                    ),
                  ),
                ),

              ),
            ),
            array(
              'type'    => 'notice',
              'style'   => 'success',
              'content' => ' <strong>Randevu Al/Teklif ??ste</strong> Ana Sayfa Ayar??',
            ),
            array(
              'id'     => 'opt-appointment-setting',
              'type'   => 'fieldset',
              'title'  => 'Randevu Al / Teklif Al Ayar??',
              'fields' => array(
                array(
                  'type'    => 'subheading',
                  'content' => 'Randevu Al / Teklif ??ste Ayarlar??',
                ),
                array(
                  'id'    => 'opt-appointment-background',
                  'type'  => 'media',
                  'title' => 'Resim Y??kleyiniz',
                  'button_title' => 'Y??kle',
                  'placeholder' => 'Resim Y??kleyiniz',
                ),
                array(
                  'id'      => 'opt-appointment-title',
                  'type'    => 'text',
                  'title'   => 'Ba??l??k Giriniz',
                ),

                array(
                  'id'      => 'opt-appointment-help',
                  'type'    => 'text',
                  'title'   => 'Yan Ba??l??k Giriniz',
                ),
                array(
                  'id'         => 'opt-appointment-shortcode',
                  'type'       => 'text',
                  'title'      => 'Shortcode',
                  'desc'      => '??leti??im Dormu id si ??r: 16',



                ),
                array(
                  'id'      => 'opt-appointment-phone',
                  'type'    => 'text',
                  'title'   => 'Telefon Giriniz',
                ),
              ),
              'default' => array(
                'opt-appointment-title'    => 'Teklif ??ste',
                'opt-appointment-help' => 'Destek Hatt??',
                'opt-appointment-phone' => '+90 531 257 34 83',
              )
            ),

            //Clients
            array(
              'type'    => 'notice',
              'style'   => 'success',
              'content' => ' <strong>Clients/???? Ortaklar??</strong> Ana Sayfa Ayar??',
            ),
            array(
              'id'          => 'opt-clients-setting',
              'type'        => 'group',
              'title'       => 'Clients/???? Ortaklar??',
              'button_title' => 'Ekle',
              'placeholder' => 'Resim Y??kle',
              'fields' => array(
                array(
                  'id'    => 'opt-clients-image',
                  'type'  => 'media',
                  'title' => 'Resim Ekleyin',
                  'button_title' => 'Y??kle',
                  'placeholder' => 'Resim URL'
                ),
              ),
            ),
            //Faq
            array(
              'type'    => 'notice',
              'style'   => 'success',
              'content' => ' <strong>S??k??a Sorulan Sorular </strong> Ana Sayfa Ayar??',
            ),
            array(
              'id'    => 'home-faq-bigtitle',
              'type'  => 'text',
              'title' => 'Ba??l??k Belirleyin',
            ),
            array(
            'id'    => 'home-fag-right-image',
            'type'  => 'media',
            'title' => 'Resim Y??kleyiniz',
            'button_title' => 'Y??kle',
            'placeholder' => 'Resim Y??kleyiniz',
          ),
            /*Group*/
            array(
              'id'     => 'home-faq-setting',
              'type'   => 'group',
              'title'  => 'S??k??a Sorulan Sorular',
              'button_title' => 'Ekle',
              'fields' => array(
                array(
                  'id'    => 'home-faq-title',
                  'type'  => 'text',
                  'title' => 'Ba??l??k Belirleyin',
                ),
                array(
                  'id'    => 'home-faq-content',
                  'type'  => 'textarea',
                  'title' => 'Ba??l??k Belirleyin',
                ),



              ),

            ),
            //Projeler
            array(
              'type'    => 'notice',
              'style'   => 'success',
              'content' => ' <strong> Projeler  </strong> Ana Sayfa Ayar??',
            ),
            array(
              'type'    => 'submessage',
              'style'   => 'warning',
              'content' => ' <strong> L??tfen Wordpress Admin Men??s??nden Projelere Gidip Proje Ekleyiniz  </strong>',
            ),
            array(
              'id'    => 'home-project-bigtitle',
              'type'  => 'text',
              'title' => 'Ana Ba??l??k Belirleyin',
            ),
            array(
              'id'    => 'home-project-title',
              'type'  => 'text',
              'title' => ' Alt Ba??l??k Belirleyin',
            ),
            array(
              'type'    => 'notice',
              'style'   => 'success',
              'content' => ' <strong> Paketler / Fiyatland??rma  </strong> Ana Sayfa Ayar??',
            ),
            /*Prinicing*/
            array(
              'id'    => 'home-packet-bigtitle',
              'type'  => 'text',
              'title' => 'Ana Ba??l??k Belirleyin',
            ),
            array(
              'id'    => 'home-packet-subtitle',
              'type'  => 'text',
              'title' => 'Alt Ba??l??k Belirleyin',
            ),
            /*Group*/
            array(
              'id'     => 'home-packet-setting',
              'type'   => 'group',
              'title'  => 'Fiyatland??rma / Paketler',
              'button_title' => 'Ekle',
              'fields' => array(
                array(
                  'id'    => 'home-packet-title',
                  'type'  => 'text',
                  'title' => 'Paket ??smi',
                ),

                array(
                  'id'    => 'home-packet-pricing',
                  'type'  => 'text',
                  'title' => 'Fiyat??',
                  'subtitle' => 'Sadece Rakam Giriniz'
                ),
                array(
                  'id'    => 'home-packet-pricingcont',
                  'type'  => 'text',
                  'title' => 'Fiyat A????klamas??',
                ),
                array(
                  'id'    => 'opt-packet-color',
                  'type'  => 'color',
                  'title' => 'Arka Plana Rengi',
                  'default' => '#007AFC',

                ),
                array(
                  'id'     => 'home-packet-list',
                  'type'   => 'repeater',
                  'title'  => '??zellikler',
                  'fields' => array(
                    array(
                      'id'    => 'opt-packet-list',
                      'type'  => 'text',
                      'title' => '??zellik Giriniz'
                    ),
                  ),
                ),

                array(
                  'id'    => 'home-packet-url',
                  'type'  => 'text',
                  'title' => 'Ba??lant?? URL',
                ),



              ),

            ),



          )
        )
        );

        //
        // Yerle??tirme  Ayarlar??
        CSF::createSection( $prefix, array(
          'title'  => 'Ana Sayfa G??r??n??m',
          'icon'   => 'fa fa-sort-numeric-asc',
          'fields' => array(
            array(
              'id'         => 'home-sorter-setting',
              'type'       => 'sorter',
              'title'      => 'Ana Sayfa Yerle??tirme Ayar??',
              'subtitle'       => 'S??r??kle/B??rak Y??ntemi ??le D??zenleme Yap??n??z',
              'enabled_title'  => 'Aktif',
              'disabled_title' => 'Pasif',
              'default'    => array(
                'enabled'  => array(
                  'slider'      => 'Slider',
                  'service'     => 'Servisler/Hizmetler',
                  'get-now'     => 'Teklif Al',
                  'about'       => 'Hakk??m??zda',
                  'project'     => 'Projeler',
                  'appointment' => 'Randevu Al/??leti??im ',
                  'faq'         => 'S??k??a Sorulan Sorular',
                  'blog'        => 'Blog',
                  'clients'     => 'Bayiler/???? Ortaklar??',
                  'pricing'     => 'Fiyatland??rma',
                ),

              ),
            ),


          )
        )
        );
				//
				// Footer Ayarlar??
				CSF::createSection( $prefix, array(
					'title'  => 'Footer Ayarlar??',
					'icon'   => 'fa fa-list',
					'fields' => array(
						array(
			        'id'    => 'opt-media-footer-logo',
			        'type'  => 'media',
			        'title' => 'Footer Logo Y??kleyniiz',
			        'button_title' => 'Y??kle',
			        'url'   => false,
			      ),
						array(
			        'id'    => 'opt-copyright',
			        'type'  => 'textarea',
			        'title' => 'Copyright Yaz??s??',
			      ),

					)
				)
			 );



       CSF::createSection( $prefix, array(
         'title'       => 'Aktar??m Ayar??',
         'icon'        => 'fa fa-shield',
         'description' => 'Bu Alanda ????e veya D????a Aktar??m Yapabilirsiniz. Demo ????eri??i ????e Aktar K??sm??na Yap????t??rarak Aktar??m Yapabilirsiniz.',
         'fields'      => array(

           array(
             'type' => 'backup',
           ),

         )
       ) );





}

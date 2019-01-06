<?php

include 'classes/class.Photo.php';
include 'classes/class.Blog.php';
include 'classes/class.Instagram.php';

include 'config.php';
?>

  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="assets/css/skeleton.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
    	<nav class="black" role="navigation">
		    <div class="nav-wrapper container">
		    	<a id="logo-container" href="#" class="brand-logo mt-10">
		    		<?php include('logo.php'); ?>
		    	</a>
		      <ul class="right hide-on-med-and-down">
		        <li><a href="#">Instagram to Tumblr</a></li>
		      </ul>

		      <ul id="nav-mobile" class="side-nav" style="transform: translateX(-100%);">
		        <li><a href="#">Instagram to Tumblr</a></li>
		      </ul>
		      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
		    </div>
		  </nav>

		  <h1 class="header center green-text">Instagram Importer</h1>
		  				<?php
		  					if (isset($_POST['submit'])) {
		  
		  						echo '<h5 class="header col s12 light center">Successfully imported the following pictures</h5>';
		  						echo ',';
		  						
		  						$blog = new Blog("weedporndaily");
		  						
		  						$user_array = [
		  								        /*'ayaconcentrates',
		  								        'ganjagirls',
		  								        'terramatercc',
		  								        'alpinstash',
		  								        'foreigngenetics',
		  								        'golden_state_cultivators',
		  								        'str8organics',
		  								        'nuuglife',
		  								        'dna_genetics',
		  								        'deschutes.growery',
		  								        'forgotalot86',
		  								        'fieldextracts',
		  								        'hqbarcelona',
		  								        'vaderog',
		  								        'emeraldfamilyfarms',
		  								        'cannabiotix_nv',
		  								        'el_jefe_gardens',
		  								        'famerschoiceorganics_',
		  								        'bopcollective420',
		  								        '_kayafarms',
		  								        'ethosgenetics',
		  								        'treebeardgrower',
		  								        'chileweed',
		  								        'rosin_revolution',
		  								        'rawlife247',
		  								        'victorypharms',
		  								        'rare_dankness',
		  								        'sincityseeds',
		  								        'jungleboys',
		  								        'tko.oregon',
		  								        'muh_riah',
		  								        'leighanalynn',
		  								        'keepitgreen401',
		  								        'kre8genetics',
		  								        'connectedcannabisco',
		  								        'stre8organics',
		  								        'karmagenetics',
		  								        'phytologieoakland',
		  								        'greenchoicefarms',
		  								        'spaceboundanddown',
		  								        'tko.reserve',
		  								        'planet.hash',
		  								        'gagegreengroup',
		  								        'dirty.arm.farm',
		  								        'greatgardener',
		  								        'ganjagirlscout',
		  								        'mountainorganics',
		  								        'yourhighnessla',
		  								        'dinafemseedsofficial',
		  								        'here4theflavor',
		  								        'bigmike',
		  								        'emeraldcupgenetics',
		  								        'cannabiotix',
		  								        'natures_lab_extracts',
		  								        'californiagrowersguild',
		  								        'pokemonandkush',
		  								        'mrniceseedbank',
		  								        'eastforkcultivars',
		  								        'lonely.stoney.420',
		  								        'misskarluhh',
		  								        'livslifted',
		  								        'cannababekatie',
		  								        'sarahlove420',
		  								        'mfjane',
		  								        'imcannabess',
		  								        'amethyststone_',
		  								        'puffpuff_ojosrojos',
		  								        'forgotalot86',
		  								        'oregonbreedersgroup',
		  								        'greengenesgarden',
		  								        'catswhosmokeweed',*/
												'tso.sonoma',
												'eelleeinad',
												'sherollsup',
												'humboldt_county_grown',
												'slick_socal_420',
												'ganjapreneurgal',
												'ripper_afn',
												'medi_cali',
												'pearl_pharma',
												'holistic_farms',
												'7points_hans',
												'_lemmy714_',
												'clade9',
												'cultivar_sundicate',
												'805family',
												/*
												'constantconcentrates',
												'thcdesign',
												'lonely.stoney.420',
												'apollosfirerocks',
												'treebeardgrower',
												'greenfiregenetics_',
												'peakorganics',
												'sugarmagnolia_farms',
												'megawellness_og',
												'potentpot420',
												'proper_extracts_215',
												'the_herb_connoisseurs',
												'nameless_farms',
												'bamf.extractions',
												'doobie_west',
												'backyard.farming',
												'teamhso',
												'bud.scouts',
												'deeprootsharvestnv',
												'sapphiregardens',
												'mountainorganics',
												'cannafamilyfarms',
												'eastforkcultivars',
												'veganbuddha_la',
												'cannabiotix_nv',
												'greensourcegardens',
												'johnycannazeal',
												'fractalrootz',
												'canna.obscura',
												'growlokey',
												'kannakingfarms',
												'madigb_growin',
												'victorypharms_',
												'jessijamesgardens',
												'primo.og',
												'nicolehowarddd',
												'nobunkjustfunk',
												'californiagrowersguild',
												'kush4breakfast',
												'greatgardener',
												'sugarpharm',
												'frostcitygardens',
												'iloveincrediblesgarden',
												'growing_passion',
												'cannabis.health.wellness'*/
		  								    ];
		  						
		  						foreach ($user_array as $user) {
		  						
		  						
		  							$instagram = new Instagram($user);
		  							$photos = $instagram->getPhotos();
		  						
		  							foreach ($photos->user->media->nodes as $data) {
		  						
		  								$photo = new Photo($data);
		  						
		  								echo '<div class="col s12 m4"><img src="'.$photo->getURL().'" class="responsive-img z-depth-1" /><p>'.$photo->getPhotographer().'</p></div>';
		  								
		  								 $blog->post([
		  								    'type' => 'photo',
		  								    'state' => 'draft',
		  								    'source' => $photo->getURL(),
		  								    'caption' => $photo->getCaption($user),
		  								    'tags' => 'weed,cannabis,marijuana,stoner,420,instagram'
		  								]);
		  							}
		  						
		  						}
		  						echo '';
		  					} else {
		  						// if submit wasn't clicked
		  						?>
		  
		  <div class="row center">
		    <h5 class="header col s12 light">Click the button below to import the following Instagram users latest 10 photos to the WPD Tumblr drafts:</h5>
		    <ul class="collection">
		    	<li class="collection-item">ayaconcentrates</li>
		  			        <li class="collection-item">ganjagirls</li>
		  			        <li class="collection-item">terramatercc</li>
		  			        <li class="collection-item">alpinstash</li>
		  			        <li class="collection-item">emeraldfamilyfarms</li>
		  			        <li class="collection-item">cannabiotix_nv</li>
		  			        <li class="collection-item">el_jefe_gardens</li>
		  			        <li class="collection-item">famerschoiceorganics_</li>
		  			        <li class="collection-item">bopcollective420</li>
		  			        <li class="collection-item">_kayafarms</li>
		  			        <li class="collection-item">ethosgenetics</li>
		  			        <li class="collection-item">treebeardgrower</li>
		  			        <li class="collection-item">chileweed</li>
		  			        <li class="collection-item">rosin_revolution</li>
		  			        <li class="collection-item">rawlife247</li>
		  			        <li class="collection-item">victorypharms</li>
		  			        <li class="collection-item">rare_dankness</li>
		  			        <li class="collection-item">sincityseeds</li>
		  			        <li class="collection-item">jungleboys</li>
		  			        <li class="collection-item">tko.oregon</li>
		  			        <li class="collection-item">stayregularmedia</li>
		    </ul>
		  </div>
		  <div class="row center">
		  	<form action="#" method="post">
		    	<button type="submit" name="submit" class="btn-large waves-effect waves-light green">Get Started</button>
		    </form>
		  </div>
		  <?php	} // end submit check ?>


      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="assets/js/materialize.min.js"></script>
    </body>
  </html>




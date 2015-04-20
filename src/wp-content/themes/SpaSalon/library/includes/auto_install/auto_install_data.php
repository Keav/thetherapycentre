<?php
set_time_limit(0);
global  $wpdb,$one_time_insert;
//require_once (TEMPLATEPATH . '/delete_data.php');
$dummy_image_path = get_template_directory_uri().'/images/dummy/';
/*
echo "<pre>";
print_r(get_option('sidebars_widgets'));
print_r(get_option('widget_pages'));
print_r(get_option('widget_catfirstpost_slider'));
exit; 

echo "<pre>";
print_r(get_option('sidebars_widgets'));
//print_r(get_option('widget_pages')); 

//print_r(get_option('widget_widget_templ_home_banner'));



exit; */


//====================================================================================//
/////////////// TERMS START ///////////////
//=============================CUSTOM TAXONOMY=======================================================//
$category_array = array('Blog');
insert_taxonomy_category($category_array);
function insert_taxonomy_category($category_array)
{
	global $wpdb;
	for($i=0;$i<count($category_array);$i++)
	{
		$parent_catid = 0;
		if(is_array($category_array[$i]))
		{
			$cat_name_arr = $category_array[$i];
			for($j=0;$j<count($cat_name_arr);$j++)
			{
				$catname = $cat_name_arr[$j];
				if($j>1)
				{
					$catid = $wpdb->get_var("select term_id from $wpdb->terms where name=\"$catname\"");
					if(!$catid)
					{
					$last_catid = wp_insert_term( $catname, 'category' );
					}					
				}else
				{
					$catid = $wpdb->get_var("select term_id from $wpdb->terms where name=\"$catname\"");
					if(!$catid)
					{
						$last_catid = wp_insert_term( $catname, 'category');
					}
				}
			}
			
		}else
		{
			$catname = $category_array[$i];
			$catid = $wpdb->get_var("select term_id from $wpdb->terms where name=\"$catname\"");
			if(!$catid)
			{
				wp_insert_term( $catname, 'category');
			}
		}
	}
	
	for($i=0;$i<count($category_array);$i++)
	{
		$parent_catid = 0;
		if(is_array($category_array[$i]))
		{
			$cat_name_arr = $category_array[$i];
			for($j=0;$j<count($cat_name_arr);$j++)
			{
				$catname = $cat_name_arr[$j];
				if($j>0)
				{
					$parentcatname = $cat_name_arr[0];
					$parent_catid = $wpdb->get_var("select term_id from $wpdb->terms where name=\"$parentcatname\"");
					$last_catid = $wpdb->get_var("select term_id from $wpdb->terms where name=\"$catname\"");
					wp_update_term( $last_catid, 'category', $args = array('parent'=>$parent_catid) );
				}
			}
			
		}
	}
}

/////////////// TERMS END ///////////////
$post_info = array();
//////////// Arts - Entertainment /////////////

////post start 1///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img1.jpg" ;
$post_meta = array(
				   "templ_seo_page_title" =>'Works From the True Masters of Fear and Anxiety',
				   "templ_seo_page_kw" => '',
"tl_dummy_content"	=> '1',
				   "templ_seo_page_desc" => '',
				);
$post_info[] = array(
					"post_title" =>	'Soothe While You Shine with These Lip Balm/Lip Gloss Hybrids',
					"post_content" =>	'As the weather warms up and we are slowly but surely getting enticed to brave the sunny outdoors for summery activities, it is always important to make sure to be adequately protected from the sun. And while it may be easy to remember slathering on SPF for all your vital exposed skin, its also important to give proper attention to extra-sensitive areas like your lips! Having chapped lips is one of the #1 summer beauty woes (not to mention that fact that it makes sipping salt-rimmed margaritas much more painful than necessary), and lets face it — regular gloss often just doesnt cut it when it comes to providing the moisturizing power you need.

My quick remedy is usually to layer balm and gloss to make sure I have my bases covered, but why not opt for a multi-tasking gloss-balm hybrid that shines while it soothes and protects? Perfect for girls who want a little sheen and color, dont want to skimp on protection, and also want to lighten the load in their purse, these balm glosses are bound to be your #1 beauty must-have for the summer!

<h3>Frankenstein</h3>
<ol>
	<li>Among the most enduring horror classics in the world is that of Shelleys "Frankenstein," which combines the elements of horror with the intrinsic questions that plagued morality and philosophy at the time. </li>
	<li>In some ways, the story is one that puts a new spin on the old ghost story, in that the "ghost" is inevitably caused by the actions of mortal men who meddled in things they were not meant to. </li>
	<li>The story, aside from being a genuine tale of terror, also took on the role of a lesson in morality and the limits to just how far medical science could go.</li>
	<li>Prolonging life is one thing, but bringing back the dead is another thing entirely, which is one of the subtle messages of the novel.</li>
	<li>The underlying question of whether or not Frankensteins creature is the monster, or if it is Frankenstein himself, also contributes to making the story a memorable, chilling tale.</li>
</ol> 

However, very few stories can truly stand up against the pure terror and the subtle anxiety and dread caused by Bram Stokers infamous novel, "Dracula." The novel is a hallmark of the Gothic horror era, presenting a villain of potentially epic scope in the guise of a remarkable gentleman and nobleman. It deviated from other vampire stories of the time in that the vampire, Dracula, was not monstrous in appearance. He looked every inch a master and nobleman, establishing the "lord of the night" archetype that would be a stock image of vampire characters in literature for centuries to come. It also had all the elements necessary to both frighten readers and keep them coming back for more, marking it as the most enduring horror novel in history.

',
					"post_meta" =>	$post_meta,
					"post_image" =>	$image_array,
					"post_category" =>	array('Blog'),
					"post_tags" =>	array('Tags','Sample Tags')
					);
////post end///
//====================================================================================//
////post start 2///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img2.jpg" ;
$post_meta = array(
				   "templ_seo_page_title" =>'Display Your Strength With Eagle Tattoos',
				   "templ_seo_page_kw" => '',
"tl_dummy_content"	=> '1',
				   "templ_seo_page_desc" => '',
				);
$post_info[] = array(
					"post_title" =>	'4 Coral Blushes from tarte, Le Metier de Beaute and Benefit Cosmetics',
					"post_content" =>	'Pick the Fruit of the Lipstick Tree! Tarte has an awesome two-piece QVC spring exclusive a cream blush and a lipstick, both in the shade Achiote, a peachy coral. The achiote has long been used by American Indians to make body paint, especially for the lips, which is the origin of the plant nickname, lipstick tree. I need a lipstick tree in MY backyard!

Tarte also boasts the formula contains Vitamins A and E, two natural preservatives that act as anti-inflammatory emollients and protect against free radical damage, Vitamin C, an antioxidant that fights free radical damage and prevents oxidative stress and premature signs of aging, while brightening the skin. I dont know about all that but I know Tarte really delivers on its promise with these blushes—the quality is excellent, they are highly pigmented and really do last for 12 hours. Having dry cheeks, these blushes do not look dry or cakey on my skin and in reading reviews on the Sephora website, they seem to last just as well for oily skin types.

<h3>Feature</h3>
<ol>
	<li>Eagle tattoos are unique in themselves and it can be also done in many different creative ways and just about anywhere on the body but still the most common area for this type of tattoo is the upper arm, followed by the shoulders, and the upper and lower back areas.</li>
	<li>Eagle tattoos whether it is with spread wings or roosting position are really eye-catching.</li>
	<li>The most important feature of eagle tattoo is its feather. </li>
	<li>So if the tattoo is done on a large area with spread wings where every details of the wing are clearly visible provides the eagle tattoo with a realistic appearance. </li>
	<li>The back is a great location for eagle tattoo with their wings fully spread as if in flight. </li>
	<li>You can also ink your back with another popular swooping pose of an eagle. </li>
	<li>This swooping poses of the eagle targeting its prey with sharp talons is really mind blowing, and of course the internet and many tattoo shops are full of images of the majestic eagle in varying poses.</li>
</ol> 

Small eagle tattoos featuring only the head of the bird can be inked on the leg or armbands, or can be incorporated into another design. There are many tattoo shops and websites that will provide you with varying poses of eagle.

',
					"post_meta" =>	$post_meta,
					"post_image" =>	$image_array,
					"post_category" =>	array('Blog'),
					"post_tags" =>	array('Tags','Sample Tags')
					);
////post end///
//====================================================================================//
////post start 3///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img3.jpg" ;
$post_meta = array(
				   
				   "templ_seo_page_title" =>'The sixth Sense Spas',
				   "templ_seo_page_kw" => '',
"tl_dummy_content"	=> '1',
				   "templ_seo_page_desc" => '',
				);
$post_info[] = array(
					"post_title" =>	'The sixth Sense Spas',
					"post_content" =>	'PAs will receive a complimentary treatment from award-winning Six Senses Spas when booking a private jet charter through Chapman Freeborn, the World largest aircraft charter broker. Once Chapman Freeborn charter experts have arranged the boss executive flight itinerary, PAs will be invited to choose from a wide range of complimentary treatments and Asian-influenced therapies at one of Six Senses Spas.

The treatments will be redeemable at locations across Europe, the Middle East and Asia as well as the luxury spa at Pan Peninsula in Canary Wharf, regarded by many PAs working in the city as an urban sanctuary.
					
Chinese art, and in particular, Chinese painting is greatly treasured around the globe. Chinese painting can be retraced to as far back as six thousand years ago in the Neolithic Age when the Chinese have started using brushes in their paintings. Chinese art dates back even sooner than that.

According to subject matter, Chinese paintings can be classified as landscapes, character paintings and flower-and-bird paintings. In traditional Chinese painting, Chinese landscape painting embodies a major category, depicting nature, especially mountains and bodies of water. Landscapes have customarily been the choice of the Chinese because they manifest the poetry characteristic in nature. Accordingly, many esteemed paintings are landscapes.

The most popularly known form of Chinese painting is "Water-ink" painting, where water-ink is the medium. Some of the basic things required for the Chinese painting include: paper, brush, ink or ink stick, ink stone, and color.

<ol>
	<li>Brush: The Chinese brush is a mandatory tool for Chinese painting. The brush should be sturdy and pliable. Two types of brushes are used. The more delicate brush is created from white sheep hair. This brush should be soaked first, and then dried to prevent curling. The second one is made from fox or deer sable fibers, which are very durable, and is inclined to paint better. The procedure the brush is used depends on the varied features of brush strokes one wants to obtain, such as weight, lightness, gracefulness, ruggedness, firmness, and fullness. Various forms of shades are applied to impart space, texture, or depth.</li>
	<li>Ink Stick: There are three types of Ink Stick: resin soot, lacquer soot, and tung-oil soot. Of the three, tung-oil soot is the most commonly used. Otherwise, Chinese ink is best if ink stick or ink stone are ineffectual.</li>
	<li>Paper: The most generally used paper is Xuan paper, which is fabricated of sandalwood bark. This is exceptionally water retentive, so the color or ink disperses the moment the brush stroke is put down. The second most well-known is Mian paper.</li>
	<li>Color: The most former Chinese paintings used Mo, a type of natural ink, to produce monochromatic representations of nature or day-to-day life. Made of pine soot, mo is combined with water to get unique shades for conveying appropriate layers or color in a painting.</li>
</ol> 

Chinese painting is called shui-mo-hua. Shui-mo is the combination of shui (water) and mo. There are two styles of Chinese painting. They are gong-bi or detailed style, and xie-yi or freehand style. The second is the most common, not only since the objects are depicted with just a few strokes, but likewise because shapes and sprites are drawn by uncomplicated curves and natural ink. Many ancient poets and students used xie-yi paintings to give tongue to their religious anguish.
',
					"post_meta" =>	$post_meta,
					"post_image" =>	$image_array,
					"post_category" =>	array('Blog'),
					"post_tags" =>	array('Tags','Sample Tags')
					);
////post end///
//====================================================================================//
////post start 4///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img4.jpg" ;
$post_meta = array(
				   
				   "templ_seo_page_title" =>'Famous Paintings',
				   "templ_seo_page_kw" => '',
"tl_dummy_content"	=> '1',
				   "templ_seo_page_desc" => '',
				);
$post_info[] = array(
					"post_title" =>	'Rancho La Puerta offers Healthy and Amazing SPECIALS for Guests',

					"post_content" =>	'GUESTS can now SAVE $1500 to $2200 all summer long during ANY WEEK when you bring a friend! Week of May 30 June 6, 2009 through week of August 29 September 5, 2009

Summer is a wonderful season at Rancho La Puerta Fitness Resort & Spa. Now all guests staying one week or longer (Saturday to Saturday) can bring a friend at 50% off. We have extended our limited “Bring a Friend” offer to the entire summer! Share the room…share the savings! Our four swimming pools beckon during days that are warm but never “desert hot.” Our mountain location and beautiful gardens make this a four-season paradise. And our fitness and evening presenter programs are the best yet!

There never been a better—or more affordable—time to share the one and only experience that is Rancho La Puerta!
					
					
Famous artists paintings have earned world wide recognition in different periods of times. Famous painters paintings truly an asset for fine arts. There have been a great number of famous painters in different parts of the world in different periods of times. These include Marc Chagall, Salvador Dali, Leonardo Da Vinci, Paul Klee, Henri Matisse,Claude Monet, Pablo Picasso,Pierre Auguste Renoir,Henri Rousseau,Henri de Toulouse-Lautrec,Vincent Van Gogh,Andy Warhol.

<h3>Yo Picasso</h3>
<ol>
	<li>Famous abstract paintings present the fine art at the highest level. </li>
	<li>Famous abstract artists have been gratly greatly appreciated for their famous abstract oil paintings. </li>
	<li>Picasso is one of the most famous abstract painter. Picasso became very famous because he work in multiple styles.</li>
	<li>Famous paintings of Picasso are Guernica ,Three Musicians,The Three Dancers and Self Portrait: Yo Picasso.</li>
	<li>Picasso famous paintings have earned him worldwide recognition.</li>
</ol> 

Many famous flower paintings have been created by the outstanding flower painters. Famous Floral Oil Paintings are in wide range of styles. Famous floral fine art paintings are exquisite. Famous landscape paintings are the master pieces of fine art. Famous Landscape painters have created a great number of famous landscape paintings. Famous Landscape art has greatly been admired in all the periods of times. Famous contemporary landscape painters have successfully attained the mastery in the landscape art.

Still life fruit paintings and fruit bowl paintings make the famous fruit paintings. The highly skilled artists have also created the most famous paintings of rotting fruit. The modern famous artists are successful creating the masterpieces of still fruit oil paintings and oil pastel fruit paintings.


In addition to above styles, there are many famous paintings of other subjects. These include famous war paintings, famous paintings of jesus, famous figure paintings, religious famous paintings, famous paintings romantic, famous battle paintings, famous military paintings, famous sunset paintings, famous paintings of women, famous paintings of love, famous water paintings, famous acrylic paintings, famous paintings of buildings, famous dance paintings, famous dragon paintings, famous black paintings, famous paintings in the fall, famous paintings of cats, famous paintings of children, famous paintings of friends, famous paintings of christinaity, famous paintings of jesus and famous paintings of humanity. There are also famous native American paintings and famous Spanish paintings.

',
					"post_meta" =>	$post_meta,
					"post_image" =>	$image_array,
					"post_category" =>	array('Blog'),
					"post_tags" =>	array('Tags','Sample Tags')
					);
////post end///
//====================================================================================//
////post start 5///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img5.jpg" ;
$post_meta = array(
				   "templ_seo_page_title" =>'Review: Andalou Naturals Lemon Sugar Facial Scrub',
				   "templ_seo_page_kw" => '',
"tl_dummy_content"	=> '1',
				   "templ_seo_page_desc" => '',
				);
$post_info[] = array(
					"post_title" =>	'Review: Andalou Naturals Lemon Sugar Facial Scrub',
					"post_content" =>	'The arrival of Summer, for the most part, is a joyous occasion that always seems to have taken forever to make an appearance, but when it does finally arrive it is not without a few results of  beauty woes I like to call them Summer  Bummers.  One such woe is the breakouts that seem to be the result of sunscreen usage, of course I would much prefer to deal with a few pimples than to have a skin cancer scare, but I would love to be both protected from the sun and have a clear complexion.

The scrub felt extremely gentle, not abrasive at all and once I rinsed my face my skin, was absolutely glowing.  In fact, right after using the scrub I went to my neighborhood Starbucks for my daily soy latte and the barista wanted to know what products I used because she thought my complexion looked amazing, she said my skin was absolutely glowing.

It took about two years until the mystery was solved by the Parisian police. It turned out that the 30x21 inch painting was taken by one of the museum employees by the name of Vincenzo Peruggia, who simply carried it hidden under his coat. Nevertheless, Peruggia did not work alone. The crime was carefully conducted by a notorious con man, Eduardo de Valfierno, who was sent by an art faker who intended to make copies and sell them as if they were the original painting.

While Yves Chaudron, the art faker, was busy creating copies for the famous masterpiece, Mona Lisa was still hidden at Peruggias apartment. After two years in which Peruggia did not hear from Chaudron, he tried to make the best out of his stolen good. Eventually, Peruggia was caught by the police while trying to sell the painting to an art dealer from Florence, Italy. The Mona Lisa was returned to the Louver in 1913.

<h3>The Biggest Theft in the USA:</h3>
The biggest art theft in United States took place at the Isabella Stewart Gardner Museum. On the night of March 18, 1990, a group of thieves wearing police uniforms broke into the museum and took thirteen paintings whose collective value was estimated at around 300 million dollars. The thieves took two paintings and one print by Rembrandt, and works of Vermeer, Manet, Degas, Govaert Flinck, as well as a French and a Chinese artifact.

As of yet, none of the paintings have been found and the case is still unsolved. According to recent rumors, the FBI are investigating the possibility that the Boston Mob along with French art dealers are connected to the crime.

Three months later, the holders of the painting approached the Norwegian Government with an offer: 1 million dollars ransom for Edvard Munchs The Scream. The Government turned down the offer, but the Norwegian police collaborated with the British Police and the Getty Museum to organize a sting operation that brought back the painting to where it belongs.

Ten years later, The Scream was stolen again from the Munch Museum. This time, the robbers used a gun and took another of Munchs painting with them. While Museum officials waiting for the thieves to request ransom money, rumors claimed that both paintings were burned to conceal evidence. Eventually, the Norwegian police discovered the two paintings on August 31, 2006 but the facts on how they were recovered are not known yet.
',
					"post_meta" =>	$post_meta,
					"post_image" =>	$image_array,
					"post_category" =>	array('Blog'),
					"post_tags" =>	array('Tags','Sample Tags')
					);
////post end///
//====================================================================================//
////post start 6///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img6.jpg" ;
$post_meta = array(
				   
				   "templ_seo_page_title" =>'How to Select Art for Your Home',
				   "templ_seo_page_kw" => '',
"tl_dummy_content"	=> '1',
				   "templ_seo_page_desc" => '',
				);
$post_info[] = array(
					"post_title" =>	'Sula Paint and Peel Polish Duos For a Blast-From-The-Past Manicure',
					"post_content" =>	'I remember back in the day when the closest thing I could get to my mother glamorous red manicure was Barbie pink peel-off nail polish. Even as a kid, I was annoyed by the lack of staying power (though arguably that was the point of peel-off nail polish), but it was undoubtedly more fun to peel off than paint on in the first place. Despite my childhood frustrations with “kiddie” lacquer, given how often I switch my polish nowadays (sometimes multiple times a day!), the old-school concept is starting to sound less lame and more just-plain-practical.					

Take Sula Beauty, for example, who is working to reinvent peel-off polish into something modern, convenient, and polish remover free! Their double-sided Paint & Peel nail duos include both an enamel and a top coat, ensuring that the shade stays put for days until you want it to come off… in which case, you peel away! This isnt the crappy, chip-prone, peel-off polish of your past — this is some pretty genius revamped polish of the future! Would you revisit the peel-off trend if it meant kicking nail polish remover to the curb for good?

Today the internet provides the largest variety and depth of fine art available worldwide. You can visit museum websites and see master works from ages past, check out online galleries for group shows, and visit hundreds of individual artists websites. One advantage of using the internet is that you can search for the specific kind of art you are interested in, whether its photography, impressionism, bronze sculpture, or abstract painting. And when you find one art site, youll usually find links to many, many more.

<h3>Should the art fit the room or the room fit the art?</h3>
If you feel strongly about a particular work of art, you should buy the art you love and then find a place to put it. But you may find that when you get the art home and place it on a wall or pedestal, it doesnt work with its surroundings. By not "working," I mean the art looks out of place in the room. Placing art in the wrong surroundings takes away from its beauty and impact.

What should you do if you bring a painting home and it clashes with its environment? First, hang the painting in various places in your home, trying it out on different walls. It may look great in a place you hadnt planned on hanging it. If you cant find a place where the art looks its best, you may need to make some changes in the room, such as moving furniture or taking down patterned wallpaper and repainting in a neutral color. The changes will be worth making in order to enjoy the art you love.

Sometimes the right lighting is the key to showing art at its best. You may find that placing a picture light above a painting or directing track lighting on it is all the art needs to exhibit its brilliance. If you place a work of art in direct sunlight, however, be sure it wont be affected by the ultraviolet light. Pigments such as watercolor, pencil and pastel are especially prone to fading. Be sure to frame delicate art under UV protected glass or acrylic.


Style is another consideration when selecting art to fit a room. If your house is filled with antiques, for example, youll want to use antique-style frames on the paintings you hang there. If you have contemporary furniture in large rooms with high ceilings, youll want to hang large contemporary paintings.

<h3>How to create an art-friendly room.</h3>
Think about it. When you walk into a gallery or museum, what do they all have in common? White walls and lots of light. If a wall is wall-papered or painted a color other than white, it limits the choices for hanging art that will look good on it. If a room is dark, the art will not show to its best advantage.

If you want to make art the center of attraction, play down the other elements of the room like window coverings, carpeting, wall coverings, and even furniture. A room crowded with other colors, textures and objects will take the spotlight away from the art. Follow the principle that less is more. Keep it spare and let the art star. Then relax and enjoy it.

Selecting and displaying art is an art in itself. Experiment to learn what pleases you and what doesnt. Youll be well-rewarded for the time you invest by finding more satisfaction both in the art and in your home.
',
					"post_meta" =>	$post_meta,
					"post_image" =>	$image_array,
					"post_category" =>	array('Blog'),
					"post_tags" =>	array('Tags','Sample Tags')
					);
////post end///
//====================================================================================//
////post start 7///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img7.jpg" ;
$post_meta = array(
				   
				   "templ_seo_page_title" =>'Contemporary Paintings',
				   "templ_seo_page_kw" => '',
"tl_dummy_content"	=> '1',
				   "templ_seo_page_desc" => '',
				);
$post_info[] = array(
					"post_title" =>	'Review: elizabethW Fragrances',
					"post_content" =>	'Its that time of year again for a perfume change, a time of year also known to some as summer. And I love celebrating summer and all that it embodies by going lighter and fresher with everything diet, clothing, hair and of course fragrance.    I rarely ever wear perfume in the summer, opting instead to go with body splashes or a lightly scented lotion.  On those very rare occasions when I do choose to wear perfume, I look for fragrances that are clean, fresh,  soft, simple and pretty.  I like fragrances that are very easy to wear and that also require very close contact if you are looking to catch a whiff of it (what can I say, I am very private about my fragrance, can not have every Tom, Dick and Harry stealing a whiff.
					
I managed to find a few perfumes that incorporate all of the attributes I look for in a summer fragrance and they are all by elizabethW san francisco.  The fragrances from the line that I absolutely love for summer are Leaves, Citrus Vervain and Sweet Tea. They are all very evocative of summer, but the fragrance that I chose as my new summer perfume was of course the Sweet Tea.  Not only does the name absolutely epitomize summer, but the fragrance is described as gracious,  spirited and elegant with enticing oriental black teas, juicy fresh Amalfi lemons and the sweetness of almond honey, what could be more summery than that?  I love how simple, clean and fresh it smells on my skin, I honestly do not think it could be overpowering even if it tried.

<ol>
	<li>There are great number of painters of modern life. </li>
	<li>They have created the modern abstract art on modern themes. </li>
	<li>Modern artists paint colours in an artistic way. </li>
	<li>Their contemporary oil paintings are pure form of fine arts. </li>
	<li>History of modern art is full of great contemporary paintings from famous modern artists. </li>
	<li>19th century paintings and 20th century paintings are worth seeing. </li>
	<li>Modern art movements have been in progress in recent times. </li>
	<li>There are many contemporary art centers. </li>
	<li>Contemporary art center Cincinnati and Contemporary art center of Virginia are the famous modern art center. </li>
	<li>St.Louis contemporary art has been very much appreciated. Contemporary Christian artists</li>
<ol>

Modern art is also available for sale. Modern and contemporary art can be purchased from the modern art gallery. These contemporary art galleries offer the Original modern paintings of the famous contemporary artist. The reproductions of the famous contemporary paintings can also be purchased from these modern art galleries. These galleries also offer cheap price modern oil paintings.

Good News for lovers of modern art ! You can get Contemporary and Modern Oil Paintings of your own choice just by selecting the Model number of the Landscape Oil Painting or by sending the Photo of your required image. Our highly skilled modern artists can reproduce the contemporary paintings as per your given photo. Just click the Link of Contemporary paintings on our website (www.paintingsgifts4u.com) . For more details, Please contact us at : info@paintingsgifts4u.com.
',
					"post_meta" =>	$post_meta,
					"post_image" =>	$image_array,
					"post_category" =>	array('Blog'),
					"post_tags" =>	array('Tags','Sample Tags')
					);
////post end///
//====================================================================================//
////post start 8///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img8.jpg" ;
$post_meta = array(
				   
				   "templ_seo_page_title" =>'The Great Story About Rembrandts Life and History',
				   "templ_seo_page_kw" => '',
"tl_dummy_content"	=> '1',
				   "templ_seo_page_desc" => '',
				);
$post_info[] = array(
					"post_title" =>	'True Blood And Spa Deals: A Match Made in Fangtasia',
					"post_content" =>	'With June Spa Deals coming to an end and this summer sexiest series, True Blood just starting up (did you see last night season premier?) it seems only fitting that we recommend some vampire-licious treatments before the month is over. Here are some of your favorite Bon Temps locals perfectly paired with some last minute June Spa Deals.
					
					Before Bill Compton came into the picture, Sookie Stackhouse was a happy-go-lucky twenty-something who enjoyed the southern summer sun. Now,with her (ex?)boyfriend affinity for all things nocturnal, Sookie hardly has time to get her tan on! Shes been looking awfully pale since the first few season, dontcha think? So we recommend she visit Giannillo in Manhattan so she can take advantage of an all-natural, full body Golden Goddess Spray Tan originally $80, now only $60 until June 30.
	
His family soon knew that he had the makings of an artist and, in 1620, when he could hardly have been more than sixteen, and may have been considerably less, he left Leyden University for the studio of a second-rate painter called Jan van Swanenburch. We have no authentic record of his progress in the studio, but it must have been rapid. He must have made friends, painted pictures, and attracted attention. At the end of three years he went to Lastmans studio in Amsterdam, returning thence to Leyden, where he took Gerard Dou as a pupil. A several years later, it is not easy to settle these dates on a satisfactory basis, he went to Amsterdam, and established himself there, because the Dutch capital was very wealthy and held many patrons of the arts, in spite of the seemingly endless war that Holland was waging with Spain.

His art remained true and sincere, he declined to make the smallest concession to what silly sitters called their taste, but he did not really know what to do with the money and commissions that flowed in upon him so freely. The best use he made of changing circumstances was to become engaged to Saskia van Uylenborch, the cousin of his great friend Hendrick van Uylenborch, the art dealer of Amsterdam. Saskia, who was destined to live for centuries, through the genius of her husband, seems to have been born in 1612, and to have become engaged to Rembrandt Van Ryn when she was twenty. The engagement followed very closely upon the patronage of Rembrandt Van Ryn by Prince Frederic Henry, the Stadtholder, who instructed the artist to paint three pictures.

In 1638 we find Rembrandt Van Ryn taking an action against one Albert van Loo, who had dared to call Saskia extravagant. It was, of course, still more extravagant of Rembrandt Van Ryn to waste his money on lawyers on account of a case he could not hope to win, but this thought does not seem to have troubled him. He did not reflect that it would set the gossips talking more cruelly than ever. Still full of enthusiasm for life and art, he was equally full of affection for Saskia, whose hope of raising children seemed doomed to disappointment, for in addition to losing the little Rombertus, two daughters, each named Cornelia, had died soon after birth. In 1640 Rembrandt Van Ryns mother died. Her picture remains on record with that of her husband, painted ten years before, and even the biographers of the artist do not suggest that Rembrandt Van Ryn was anything but a good son. A year later the well-beloved Saskia gave birth to the one child who survived the early years, the boy Titus. Then her health failed, and in 1642 she died, after eight years of married life that would seem to have been happy. In this year Rembrandt Van Ryn painted the famous "Night Watch," a picture representing the company of Francis Banning Cocq, and incidentally a day scene in spite of its popular name. The work succeeded in arousing a storm of indignation, for every sitter wanted to have equal prominence in the canvas.

It may be said that after Saskias death, and the exhibition of this fine work, Rembrandt Van Ryns pleasant years came to an end. He was then somewhere between thirty-six and thirty-eight years old, he had made his mark, and enjoyed a very large measure of recognition, but henceforward, his career was destined to be a very troubled one, full of disappointment, pain, and care. Perhaps it would have been no bad thing for him if he could have gone with Saskia into the outer darkness. The world would have been poorer, but the man himself would have been spared many years that may be even the devoted labours of his studio could not redeem.

Between 1642, when Saskia died, and 1649, it is not easy to follow the progress of his life; we can only state with certainty that his difficulties increased almost as quickly as his work ripened. His connection with Hendrickje Stoffels would seem to have started about 1649, and this woman with whom he lived until her death some thirteen years later, has been abused by many biographers because she was the painters mistress.

He has left to the world some 500 or 600 pictures that are admitted to be genuine, together with the etchings and drawings to which reference has been made. He is to be seen in many galleries in the Old World and the New, for he painted his own portrait more than a score of times. So Rembrandt Van Ryn has been raised in our days to the pinnacle of fame which is his by right; the festival of his tercentenary was acknowledged by the whole civilised world as the natural utterance of joy and pride of our small country in being able to count among its children the great Rembrandt Van Ryn.
					
',
					"post_meta" =>	$post_meta,
					"post_image" =>	$image_array,
					"post_category" =>	array('Blog'),
					"post_tags" =>	array('Tags','Sample Tags')
					);
////post end///
//====================================================================================//
////post start 9///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img9.jpg" ;
$post_meta = array(
				   
				   "templ_seo_page_title" =>'Tomma Abts - Abstract Art is OK but not KO.',
				   "templ_seo_page_kw" => '',
"tl_dummy_content"	=> '1',
				   "templ_seo_page_desc" => '',
				);
$post_info[] = array(
					"post_title" =>	'Remedies For Puffy Eyes And Hide Them And Treat Them ',
					"post_content" =>	'Swollen eyes and bags in the morning? Do not worry, it a much more common and widespread than it might seem. But surely, even before any diseases latent defects of which could be a spy, is the aesthetic factor to bother us and lead us to discover the causes and limit, if not eliminate The disorder. Lets start by saying that ending up with swollen eyes, maybe even red In the morning, can happen to everyone in certain situations, like after a “drunken night”, or in the presence of conjunctivitis and other eye inflammations. Even episodic Food intolerance these can cause trouble.
					
In no particular order of importance these were - sculptress Rebecca Warren who was the fancied hot favourite with many bookies, "billboard artist" Mark Titchner - and finally film maker Phil Collins...(No not him of Genesis fame!).

When the judges cast their votes however it was Tomma Abts who came out on top. She won twenty five thousand british pounds and of course the Turner Prize itself. I am sure the money will come in handy - however its the exposure that Tomma will get from winning thats the really important thing here.

What does Tomma Abts do? Well she actually paints abstract art; usually in oils or acrylics. - something of a novelty for the Turner Prize - some would say! Tomma Abts was originally selected for her solo art exhibitions at Kunsthalle Basel, Switzerland, and Greengrassi, London.

<ol>
	<li>Tomma Abts has been praised by no less than the Tate Gallery who describes her canvases as "intimate" and "compelling" . </li>
	<li>They also comment on Tommas "consistent" and even "rigorous" method of painting. </li>
	<li>In addition the Tate states that Tomma Abts "enriches the language of abstract art" .</li>
	<li>With such praise heaped upon her head its no surprise to me that she won the prize. </li>
	<li>However I actually feel that Tommas abstract artwork isnt "knock out" but it definitely is OK.</li>
</ol>

The images or paintings of Tomma Abts are created by the repetiton of various geometrical shapes on a base of rich colour. Personally - I dont think that Tommas approach to painting is particularly original. However I have to admit that while not being "knock out" I find some of Tommas images pretty compelling and touching. I have to say that this does surprise me.

When creating titles for her paintings apparently Tomma simply plucks one from a dictionary of German first names! Titles like "Veeke" for example were created in this way. In my view this is surely only slightly more interesting than numbering each picture!

All in all I think that Tomma Abts creates abstract art that is pretty accessible to the public at large. This is something that perhaps could not be said about the artwork of previous Turner Prize winners! I base my opinion of course on Tommas prize winning paintings. I would go further and state that I cannot conceive of a Tomma Abts creation offending anyone - even slightly.

In the end its just my personal opinion but I do believe that its entirely posible that Tomma Abts will go on to become a household name - within her own lifetime...Of course she could also disappear without trace from the media - and our minds in the blink of an eye, for precisely the same reasons.				
',
					"post_meta" =>	$post_meta,
					"post_image" =>	$image_array,
					"post_category" =>	array('Blog'),
					"post_tags" =>	array('Tags','Sample Tags')
					);
////post end///
//====================================================================================//
////post start 10///
$image_array = array();
$post_meta = array();
$image_array[] = "dummy/img10.jpg" ;
$post_meta = array(
				   "templ_seo_page_title" =>'Islamic calligraphy',
				   "templ_seo_page_kw" => '',
"tl_dummy_content"	=> '1',
				   "templ_seo_page_desc" => '',
				);
$post_info[] = array(
					"post_title" =>	'Chewing gum helps to control stress ',
					"post_content" =>	'The chewing gum helps to control the cortisol, the hormone produced by the adrenal glands in situations of stress. To support it, is a research conducted in England at Northumbria University in Newcastle. According to the team of scholars, in fact, chewing Chewing gum would play a stress Thanks to a series of interactions between hormones and neurotransmitters, which would activate the initial phase of digestion, increasing the flow of blood to brain, which translates into a state of serenity. 

Islamic calligraphy is a visible expression of the highest art of all for the muslim. It is the art of the spiritual world. Calligraphy literally means writing beautifully and ornamentally. Islamic calligraphy is the art of writing, and by extension, of bookmaking. This art has most often employed the Arabic script, throughout many languages. Since Arabic calligraphy was the primary means for the preservation of the Quran, Calligraphy is especially revered among Islamic arts. The work of the famous muslim calligraphers were collected and greatly appreciated throughout Islamic history. Consideration of figurative art as idolatrous led to calligraphy and abstract figures becoming the main methods of artistic expression in Islamic cultures. Contemporary muslim calligraphers are also producing the Islamic calligraphy of high artistic quality.

 
<h3>Pakistani Islamic Calligraphy</h3>
Pakistan has produced Islamic calligraphist of international recognition. Sadeqain is on of these international fame Islamic calligraphist. He was an untraditional and self-made, self-taught painter and calligrapher. He did a lot of work on Quranic calligraphy. Many other contemporary Pakistani calligraphists like Gul Gee have created great contemporary Islamic calligraphy. These days, Islamic calligraphies of Tufail and Uzma Tufail are getting very much popular both in Pakistan and all over the world.

Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. 

Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero',
					"post_meta" =>	$post_meta,
					"post_image" =>	$image_array,
					"post_category" =>	array('Blog'),
					"post_tags" =>	array('Tags','Sample Tags')

					);
////post end///
//====================================================================================//
insert_posts($post_info);
function insert_posts($post_info)
{
	global $wpdb,$current_user;
	for($i=0;$i<count($post_info);$i++)
	{
		$post_title = $post_info[$i]['post_title'];
		$post_count = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts where post_title like \"$post_title\" and post_type='post' and post_status in ('publish','draft')");
		if(!$post_count)
		{
			$post_info_arr = array();
			$catids_arr = array();
			$my_post = array();
			$post_info_arr = $post_info[$i];
			if($post_info_arr['post_category'])
			{
				for($c=0;$c<count($post_info_arr['post_category']);$c++)
				{
					$catids_arr[] = get_cat_ID($post_info_arr['post_category'][$c]);
				}
			}else
			{
				$catids_arr[] = 1;
			}
			$my_post['post_title'] = $post_info_arr['post_title'];
			$my_post['post_content'] = $post_info_arr['post_content'];
			if($post_info_arr['post_author'])
			{
				$my_post['post_author'] = $post_info_arr['post_author'];
			}else
			{
				$my_post['post_author'] = 1;
			}
			$my_post['post_status'] = 'publish';
			$my_post['post_category'] = $catids_arr;
			$my_post['tags_input'] = $post_info_arr['post_tags'];
			$last_postid = wp_insert_post( $my_post );
			$post_meta = $post_info_arr['post_meta'];
			if($post_meta)
			{
				foreach($post_meta as $mkey=>$mval)
				{
					update_post_meta($last_postid, $mkey, $mval);
				}
			}
			
			$post_image = $post_info_arr['post_image'];
			if($post_image)
			{
				for($m=0;$m<count($post_image);$m++)
				{
					$menu_order = $m+1;
					$image_name_arr = explode('/',$post_image[$m]);
					$img_name = $image_name_arr[count($image_name_arr)-1];
					$img_name_arr = explode('.',$img_name);
					$post_img = array();
					$post_img['post_title'] = $img_name_arr[0];
					$post_img['post_status'] = 'attachment';
					$post_img['post_parent'] = $last_postid;
					$post_img['post_type'] = 'attachment';
					$post_img['post_mime_type'] = 'image/jpeg';
					$post_img['menu_order'] = $menu_order;
					$last_postimage_id = wp_insert_post( $post_img );
					update_post_meta($last_postimage_id, '_wp_attached_file', $post_image[$m]);					
					$post_attach_arr = array(
										"width"	=>	580,
										"height" =>	480,
										"hwstring_small"=> "height='150' width='150'",
										"file"	=> $post_image[$m],
										//"sizes"=> $sizes_info_array,
										);
					wp_update_attachment_metadata( $last_postimage_id, $post_attach_arr );
				}
			}
		}
	}
}
//=============================CUSTOM TAXONOMY=======================================================//
insert_taxonomy_posts($post_info);
function insert_taxonomy_posts($post_info)
{
	global $wpdb,$current_user;
	for($i=0;$i<count($post_info);$i++)
	{
		$post_title = $post_info[$i]['post_title'];
		$post_count = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts where post_title like \"$post_title\" and post_type='".CUSTOM_POST_TYPE1."' and post_status in ('publish','draft')");
		if(!$post_count)
		{
			$post_info_arr = array();
			$catids_arr = array();
			$my_post = array();
			$post_info_arr = $post_info[$i];
			$my_post['post_title'] = $post_info_arr['post_title'];
			$my_post['post_content'] = $post_info_arr['post_content'];
			$my_post['post_type'] = CUSTOM_POST_TYPE1;
			if($post_info_arr['post_author'])
			{
				$my_post['post_author'] = $post_info_arr['post_author'];
			}else
			{
				$my_post['post_author'] = 1;
			}
			$my_post['post_status'] = 'publish';
			$my_post['post_category'] = $post_info_arr['post_category'];
			$my_post['tags_input'] = $post_info_arr['post_tags'];
			$last_postid = wp_insert_post( $my_post );
			wp_set_object_terms($last_postid,$post_info_arr['post_category'], $taxonomy=CUSTOM_CATEGORY_TYPE1);
			wp_set_object_terms($last_postid,$post_info_arr['post_tags'], $taxonomy='cartags');

			$post_meta = $post_info_arr['post_meta'];
			if($post_meta)
			{
				foreach($post_meta as $mkey=>$mval)
				{
					update_post_meta($last_postid, $mkey, $mval);
				}
			}
			
			$post_image = $post_info_arr['post_image'];
			if($post_image)
			{
				for($m=0;$m<count($post_image);$m++)
				{
					$menu_order = $m+1;
					$image_name_arr = explode('/',$post_image[$m]);
					$img_name = $image_name_arr[count($image_name_arr)-1];
					$img_name_arr = explode('.',$img_name);
					$post_img = array();
					$post_img['post_title'] = $img_name_arr[0];
					$post_img['post_status'] = 'attachment';
					$post_img['post_parent'] = $last_postid;
					$post_img['post_type'] = 'attachment';
					$post_img['post_mime_type'] = 'image/jpeg';
					$post_img['menu_order'] = $menu_order;
					$last_postimage_id = wp_insert_post( $post_img );
					update_post_meta($last_postimage_id, '_wp_attached_file', $post_image[$m]);					
					$post_attach_arr = array(
										"width"	=>	580,
										"height" =>	480,
										"hwstring_small"=> "height='150' width='150'",
										"file"	=> $post_image[$m],
										//"sizes"=> $sizes_info_array,
										);
					wp_update_attachment_metadata( $last_postimage_id, $post_attach_arr );
				}
			}
		}
	}
}
//====================================================================================//

/////////////////////////////////////////////////
$pages_array = array(array('Wordpress Themes Club','Advanced Search','Archives','Right Sidebar Page','Sitemap','Contact Us'),'Shortcodes','About','Our Services','Skin Care','Body Waxing',
array('Dropdowns','Sub Page 1','Sub Page 2'));
$page_info_arr = array();
$page_info_arr['Body Waxing'] = '
An alternative to shaving unwanted facial and body hair, our wax is applied warm and removed gently, leaving your body feeling satin smooth. Take a look at our body waxing services.
<ul>
<li>Full Facial Wax (lip, brow & chin) - $45.00 and Up</li>
<li>Lip Wax - $12.00</li>
<li>Eyebrow Wax - $15.00</li>
<li>Chin Wax - $15.00 and Up</li>
<li>Side of Face Wax - $30.00</li>
<li>Half Arm Wax - $45.00</li>
<li>Underarm Wax - $45.00</li>
<li>Full Arm Wax - $40.00</li>
<li>Half Leg Wax - $50.00</li>
<li>Full Leg - $60.00 </li>
<li>Bikini Wax 	- $40.00</li>
<li>Full Leg - $82.00 </li>
<li>Back - $40.00 </li>
<li>Nape - $15.00</li>
<li>Abdomen - $15.00</li>
<li>Chest Waxing - $40.00</li> 
<li>Brazilian - $60.00 </li>
</ul>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisqsue ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.

Ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisqsue ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis. 

Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus.
';
$page_info_arr['Skin Care'] = '
Your Aesthetician will analyze your skin and prescribe proper treatments to meet your individual requirements. These facials are available in a series of six at 10% off. Please consult Aesthetician.

<strong>Customized Facial - $81.00</strong>
A pampering facial designed for your individual skin care needs. (deep pore/deep tissue also in this category) Our Aesthetician will analyze and evaluate your skin and use the latest treatments and techniques to not only produce healthy and beautiful skin, but to create a thoroughly enjoyable experience - 1 Hour, 15 Minutes. Series of 6, $384.00

<strong>Customized Mini-Facial - $39.00</strong>
A facial treatment to enhance existing programs or fit into a hectic schedule to help maintain your skin care program - 30 Minutes.

<strong>Teenage Facial - $57.00</strong>
Deep pore cleansing and extractions for removal of congestion under the skin - 45 Minutes. Series of 6, $322.00

<strong>Paraffin Facial - $180.00</strong>
Soothes and relaxes dry and dehydrated skin. Layers of wax create an airtight seal to add moisture, plump up fine lines and re-hydrate parched skin - 1 Hour 25 Minutes.

<strong>Refining Glycolic Facial - $78.00</strong>
A beneficial facial designed to refine lines, minimize enlarged pores, even out skin tone and refine skin texture. Particularly beneficial to sun damaged, acne prone, and aging skin. Recommended series of 6, $440.00

<strong>Men Grooming Treatment - $68.00</strong>
Melt away tension and stress with a specifically designed facial customized for men! Includes deep cleansing, exfoliation and masque to address specific skin types.
Please be sure to shave at least 2 hours before appointment. - Approximately 1 Hour 15 minutes.

<strong>Ear Candling - $18.00 per candle</strong>
This age old remedy is a relaxing method to remove the build up of wax and toxins trapped inside the ear. A cone-like candle is inserted into the ear and lit at the open end. As the candle burns, it gently draws the wax and toxins from the ear and collects in the cone. Ideal for allergy and sinus sufferers. - Approximately 45 Minutes.

<strong>Revitalizing Eye Rescue add to a treatment - $22.00</strong>
Targets softening of fine lines that leaves the eyes super hydrated. Puffiness in eyes are reduced. Eyes are often ignored and this treatment is a must for aging eyes or to help slow the aging process. Eye treatment only $27.00

<strong>Firming & Lifting Facial</strong>
Instant Firming Treatment - $88.00
A combination of a mask and serums rich in calcium and algae, helps to diminish fine lines and detoxify leaving a more vibrant and youthful appearance. - 1 Hour.

<strong>Multi-Vitamin Power Facial - $80.00</strong>
For the latest in vitamin repair and hydroxy acid exfoliation, try our most popular treatment. Designed to treat prematurely-aging skin conditions, this treatment includes a non-irritating vitamin power exfoliation and a vitamin recovery masque to noticeably improve skin elasticity, tone and texture. - 1 Hour.

<strong>Non-Surgical Face Lift - $180.00</strong>
The Non-Surgical Face Lift is designed to improve skin elasticity, tighten and firm aging skin and decrease the appearance of fine lines and wrinkles in the face and neck area. 
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.

Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus.
';
$page_info_arr['About'] = '
Spa & Salon provides a complete array of services that includes sophisticated hairstyling, specialty treatments and color consultations. We are committed to providing you the best personalized, creative, and innovative services.

Spa & Salon Gift Certificates make a wonderful gift idea for birthdays, anniversaries, Mother or Fathers Day, Valentine Day, and during the Holiday Season.

We offer salon services Monday and Saturday from 9:00 am to 6:00 pm, and Tuesday through Friday from 9:00 am to 9:00 pm. Our cancellation policy requires a full 24 hour notice for cancelling or rescheduling appointments. As a courtesy, we call to confirm appointments 48 hours in advance. If we miss you, please call back to confirm your appointment. Our number is (517) 987-874.

Isnt this the best WordPress theme for creating a website for SpaSalon.

Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.

Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.

Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.

Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus.
';
$page_info_arr['Our Services'] = '
Melt your tension away with our talented Spa Service Providers. Our spa team will provide you with the ultimate in relaxation and pampering. Spa and Salon also provides a complete array of beauty services, including sophisticated hairstyling, and makeup consultations. We are committed to providing the best services and products, striving to meet your specific needs.

We offer salon services Monday and Saturday from 9:00 am to 6:00 pm, and Tuesday through Friday from 9:00 am to 9:00 pm. Our cancellation policy requires a full 24 hour notice for cancelling or rescheduling appointments. As a courtesy, we call to confirm appointments 48 hours in advance. If we miss you, please call back to confirm your appointment. Our number is (517) 987-874.

We offer a variety of services such as massage, facial, waxing, hair, nails, make-up, spa packages, wedding...Our facility was created with utmost attention to details to pamper your body and soothe your soul. Our entire staff is trained and licensed not only in their chosen fields but also to assure you of the utmost comfort, courtesy and care. For whatever the occasion, whatever the season-- spring time, as Cherry Blossoms sway in the breeze or gray and cold as snowflakes fall to the ground. We hope you find the modern day oasis you deserve here at the exclusive Salon and Spa.

<h3>Massages</h3>
All of our massages begin with a consultation to ensure the proper massage is chosen for your personal needs. Our all massages includes Aromatherapy to relieve emotional and physical stress. Hot towels and post teatment instructions finish off your experience. 

<ul>
<li><strong>Swedish Massage - $60</strong> <br />
Classic European massage techniques involving long strokes and kneading. A full body massage promoting relaxation and improving circulation. Highly recommended for the first time visitor.
</li>
<li><strong>Sport Massage - $65</strong><br />
An invigorating massage utilizing compression and cross-fiber techniques, focusing on specific muscle groups. Helps to relieve aches and pains incurred during sporting activities. Perfect after a day of golf or tennis. </li>
<li><strong>Deep Tissue - $70 </strong><br />
Focused deep pressure releases areas restricted by chronic stress melting away tension and fatigue.</li>
<li><strong>Healing Stone Massage  - $110</strong> <br />
Native American Indians have long believed in the nurturing power of lava stones. Now you too can benefit from the stones healing power as penetrating heat and specific massage techniques provide stress reduction, deep relaxation and relief from physical pain. This treatment address mental, physical and spiritual well-being. </li>
<li><strong>Reflexology Massage - $50</strong><br />
An ancient Oriental technique which concentrates on the feet and hands. Pressure ia applied to specific zones to induce relaxation, ease pain and increase circulation throughout the body.
</li>
</ul>

<h3>Nails</h3>
Each nail session includes a relaxing soak, trimming, shaping, an exfoliating scrub, massage & your choice of polish. Our treatments truly do wonders for overlooked hands and feet.
Natural Nails

<ul>
<li>Polish Change - $15</li>
<li>Classic Manicure - $35</li>
<li>Express Pedicure - $35</li>
<li>Classic Pedicure - $45</li>
<li>Deluxe Pedicure - $60 </li>
</ul>

<h3>Hair Care</h3>
<ul>
<li>Haircut Only - $30.00 - $37.00</li>
<li>Haircut and Style - $38.00 - $47.00</li>
<li>Blow Dry and Style or Set Begin at - $19.00</li>
<li>Blow Dry Straight & Hot Iron - $30.00</li>
<li>Added to Haircut - $19.00</li>
<li>Teen Girl Age 13 thru 17 - Haircut Only - $22.00</li>
<li>Teen Girl Age 13 thru 17 - Haircut and Style - $30.00</li>
<li>Up/Special Occasion Hair - $50.00 and up</li>
 </ul> 	
	
<h3>Mens</h3>	
<ul>
<li>Haircut and Style - $25.00 - $30.00</li>
<li>Teen Boy Age 13 thru 17 - Haircut Only - $18.00</li>
<li>Beard Trim 	- $7.00</li>
<li>Moustache Trim 	- $3.00 </li>
</ul>

Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.

Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus.
';
$page_info_arr['Wordpress Themes Club'] = '
The Templatic <a href="http://templatic.com/premium-themes-club/">Wordpress Themes Club</a> membership is ideal for any WordPress developer and freelancer that needs access to a wide variety of Wordpress themes. This themes collection saves you hundreds of dollars and also gives you the fantastic deal of allowing you to install any of our themes on unlimited domains.

You can see below just a few of our WordPress themes that are included in the club membership

&nbsp;
<strong>GeoPlaces</strong> - <a href="http://templatic.com/app-themes/geo-places-city-directory-wordpress-theme">Business Directory Theme</a>
The popular business directory theme that lets you have your very own local business listings directory or an international companies pages directory. This elegant and responsive design theme gives you powerful admin features to run a free or paid local business directory or both. GeoPlaces even has its own integrated events section so you not only get a business directory but an events directory too.


<strong>Automotive</strong> - <a href="http://templatic.com/cms-themes/automotive-responsive-vehicle-directory">Car Classifieds Theme</a>
A responsive auto classifieds theme that gives you the ability of allowing vehicles submission on free or paid listing packages which you decide on the price and duration. This sleek auto classifieds and car directory theme is also WooCommerce compatible so you can even use part of your site to run as a car spares online store. Details


<strong>Daily Deal</strong> - <a href="http://templatic.com/app-themes/daily-deal-premium-wordpress-app-theme">Deals Theme</a>
A powerful Deals theme for WordPress which lets your visitors buy or sell deals on your deals website. Daily Deal is by far the easiest and cheapest way to create a deals site where you can earn money by creating different deals submission price packages but you can also allow free deal submissions. Details


<strong>Events V2</strong> - <a href="http://templatic.com/app-themes/events">Events Directory Theme</a>
Launch a successful Events directory portal with this elegant responsive events theme. The theme has many powerful admin features including allowing event organizers to submit events on free or paid payment packages. This theme is simple to setup and you can get your events site up in no time.


<strong>NightLife</strong> - <a href="http://templatic.com/cms-themes/nightlife-events-directory-wordpress-theme">Events Directory Theme</a>
A beautifully designed events management theme which is responsive and allows you to run an events website. Allow event organizers free or paid event listing submissions and offer online event registrations. Nightlife is feature-packed with all the features you can expect from an events directory theme.


<strong>5 Star</strong> - <a href="http://templatic.com/app-themes/5-star-responsive-hotel-theme">Online Hotel Booking and Reservations Theme</a>
A well designed hotel booking theme which is ideal for showcasing and promoting a hotel online in style. This responsive design hotel reservation Wordpress theme will surely impress your guests and is also a theme that gives you a lot of powerful features including an advanced online booking system and a booking calendar.


<strong>Job Board</strong> - <a href="http://templatic.com/app-themes/job-board">Job Classifieds Theme</a>
Start your job classifieds or job board site with this responsive premium jobs board theme. Allow employers to submit job listings for free, paid or both and also allow job seekers to apply for jobs or submit their resumes. Packed with great features you would expect from a premium jobs board theme. Details


<strong>TechNews</strong> - <a href="http://templatic.com/magazine-themes/technews-advanced-blog-theme">Blogging and News Theme</a>
A news theme that is an ideal solution for your a news blog. An elegant theme which is ideal for news blogs, magazine or newspaper sites. This mobile friendly theme is both responsive and WooCommerce compatible. Impress your visitors with the stylish layout and available color schemes. Details


<strong>Real Estate V2</strong> - <a href="http://templatic.com/app-themes/real-estate-wordpress-theme-templatic">Property Classifieds Listings Theme</a>
This powerful IDX/MLS compatible real estate classifieds theme is both unique and powerful in the features it provides. With this real estate listings theme for WordPress, you can allow estate agencies and home sellers an opportunity to submit properties to your site. This real estate theme comes with many features including powerful search filter.


<strong>e-Commerece</strong> - <a href="http://templatic.com/ecommerce-themes/e-commerce">Online Store Theme</a>
A powerful and elegant WooCoomerce compatible e-commerce WordPress theme with many features advanced features. This online store theme offers various modes of product display such as a shopping Cart, digital Shop or catalog mode. This theme for e-commerce offers multiple payment gateways, coupon codes. Details



See the full collection of the <a href="http://templatic.com/premium-themes-club/">WordPress Themes Club Membership</a>
';
$page_info_arr['Advanced Search'] = '
This is the Advanced Search page template. See how it looks. Just select this template from the page attributes section and you&rsquo;re good to go.
';
$page_info_arr['Archives'] = '
This is Archives page template. Just select it from page templates section and you&rsquo;re good to go.
';
$page_info_arr['Shortcodes'] = '
<p>This theme comes with built in shortcodes. The shortcodes make it easy to add stylised content to your site, plus they&rsquo;re very easy to use. Below is a list of shortcodes which you will find in this theme.</p>
<p>[ Download ]</p>
[Download] Download: Look, you can use me for highlighting some special parts in a post. I can make download links more highlighted. [/Download]
<p>[ Alert ]</p>
[Alert] Alert: Look, you can use me for highlighting some special parts in a post. I can be used to alert to some special points in a post. [/Alert]
<p>[ Note ]</p>
[Note] Note: Look, you can use me for highlighting some special parts in a post. I can be used to display a note and thereby bringing attention.[/Note]
<p>[ Info ]</p>
[Info] Info: Look, you can use me for highlighting some special parts in a post. I can be used to provide any extra information. [/Info]
<p>[ Author Info ]</p>
[Author Info]<img src="http://192.168.1.111/project/wordpress/spasalon/wp-content/themes/SpaSalon/images/dummy/no-avatar.png" alt="" /><h4>About The Author</h4>
Use me for adding more information about the author. You can use me anywhere within a post or a page, i am just awesome. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing.
[/Author Info]
<h3>Button List</h3>
<p>[ Small_Button class="red" ]</p>
[Small_Button class="red"]<a href="#">Button Text</a>[/Small_Button] [Small_Button class="grey"]<a href="#">Button Text</a>[/Small_Button] [Small_Button class="black"]<a href="#">Button Text</a>[/Small_Button] [Small_Button class="blue"]<a href="#">Button Text</a>[/Small_Button] [Small_Button class="lightblue"]<a href="#">Button Text</a>[/Small_Button] [Small_Button class="purple"]<a href="#">Button Text</a>[/Small_Button] [Small_Button class="magenta"]<a href="#">Button Text</a>[/Small_Button] [Small_Button class="green"]<a href="#">Button Text</a>[/Small_Button]  [Small_Button class="orange"]<a href="#">Button Text</a>[/Small_Button] [Small_Button class="yellow"]<a href="#">Button Text</a>[/Small_Button] [Small_Button class="pink"]<a href="#">Button Text</a>[/Small_Button]
<hr />
<h3>Icon list view</h3>
<p>[ Icon List ]</p>
[Icon List]<ul>
	<li> Use the shortcode to add this attractive unordered list</li>
	<li> SEO options in every page and post</li>
	<li> 5 detailed color schemes</li>
	<li> Fully customizable front page</li>
	<li> Excellent Support</li>
	<li> Theme Guide &amp; Tutorials</li>
	<li> PSD File Included with multiple use license</li>
	<li> Gravatar Support &amp; Threaded Comments</li>
	<li> Inbuilt custom widgets</li>
	<li> 30 built in shortcodes</li>
	<li> 8 Page templates</li>
	<li>Valid, Cross browser compatible</li></ul>
[/Icon List]
<h3>Dropcaps Content</h3>
<p>[ Dropcaps ] </p>
[Dropcaps] Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy.[/Dropcaps]

[Dropcaps] Dropcaps can be so useful sometimes. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy.[/Dropcaps]

<h3>Content boxes</h3>
We, the content boxes can be used to highlight special parts in the post. We can be used anywhere, just use the particular shortcode and we will be there.
<p>[ Normal_Box ]</p>
[Normal_Box]<h3>Normal Box</h3>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy.

[/Normal_Box]

<p>[ Warning_Box ]</p>
[Warning_Box]<h3>Warring Box</h3>
This is how a warning content box will look like. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy.

[/Warning_Box]

<p>[ Download_Box ]</p>
[Download_Box]<h3>Download Box</h3>
This is how a download content box will look like. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy.
[/Download_Box]

<p>[ About_Box ]</p>
[About_Box]<h3>About Box</h3>
This is how about content box will look like. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus.[/About_Box]

<p>[ Info_Box ]</p>
[Info_Box]<h3>Info Box</h3>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy.
[/Info_Box]

<p>[ Alert_Box ]</p>
[Alert_Box]<h3>Alert Box</h3>
This is how alert content box will look like. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy.
[/Alert_Box]


[One_Half]<h3>One Half Column</h3>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, felis. Nam blandit quam ut lacus. <strong>[ One_Half ]</strong>
[/One_Half]


[One_Half_Last]<h3>One Half Column</h3>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, felis. Nam blandit quam ut lacus. <strong>[ One_Half_Last ]</strong>
[/One_Half_Last]


[One_Third]<h3>One Third Column</h3>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam ut lacus. <strong>[ One_Third ]</strong>
[/One_Third]


[One_Third]<h3>One Third Column</h3>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in. Commodo  porttitor, felis. Nam lacus. <strong> [ One_Third ]</strong>
[/One_Third]


[One_Third_Last]<h3>One Third Column</h3>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, felis. <strong>[ One_Third_Last ]</strong>
[/One_Third_Last]



[One_Third]<h3>One Third Column</h3>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus. <strong>[ One_Third ]</strong>
[/One_Third]

[Two_Third_Last]<h3>Two Third Column</h3>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. in, commodo  porttitor, felis. Nam blandit quam ut lacus.in, commodo  porttitor, felis. Nam blandit quam ut lacus.  <strong> [ Two_Third_Last ]</strong>
[/Two_Third_Last]

[Two_Third]<h3>Two Third Column</h3>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. in, commodo  porttitor, felis. Nam blandit quam ut lacus.in, commodo  porttitor, felis. Nam blandit quam ut lacus. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. <strong>[ Two_Third ]</strong>
[/Two_Third]

[One_Third_Last]<h3>One Third Column</h3>
Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, commodo  porttitor, felis.  <strong> [ One_Third_Last ]</strong>
[/One_Third_Last]
';
$page_info_arr['Right Sidebar Page'] = '
This is <strong>right sidebar page template</strong>. To use this page template, just select - page right sidebar template from Pages and publish the post. Its so easy using a page template.

Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id, libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut, sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. Donec nec libero.

Maecenas urna purus, fermentum id, molestie in, commodo porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id, libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut, sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh. Donec nec libero.

Praesent aliquam, justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id, libero. In eget purus.

Vestibulum ut nisl. Donec eu mi sed turpis feugiat feugiat. Integer  turpis arcu, pellentesque eget, cursus et, fermentum ut, sapien. Fusce  metus mi, eleifend sollicitudin, molestie id, varius et, nibh. Donec nec  libero. Nam blandit quam ut lacus. Quisque ornare risus quis ligula. Phasellus  tristique purus a augue condimentum adipiscing. Aenean sagittis. Etiam  leo pede, rhoncus venenatis, tristique in, vulputate at, odio. Donec et  ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce varius urna  id quam.
<blockquote>Blockquote text looks like this</blockquote>
See, using left sidebar page template is so easy. Really.
';
$page_info_arr['Sitemap'] = '
See, how easy is to use page templates. Just add a new page and select <strong>Sitemap</strong> from the page templates section. Easy peasy, isn&rsquo;t it.
';
$page_info_arr['Contact Us'] = '
What do you think about this Contact page template ? Have anything to say, any suggestions or any queries ? Feel free to contact us, we&rsquo;re here to help you. You can write any text in this page and use the Contact Us page template. Its very easy to use page templates.
';
$page_info_arr['Dropdowns'] = '
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>
<p>Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>
<p>Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>
';
$page_info_arr['Sub Page 1'] = '
<pLorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>

<P>Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>

<p>Justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero.</p>

<p>Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>
';
$page_info_arr['Sub Page 2'] = '
<pLorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>

<P>Praesent aliquam,  justo convallis luctus rutrum, erat nulla fermentum diam, at nonummy quam  ante ac quam. Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>

<p>Maecenas urna purus, fermentum id, molestie in, commodo  porttitor, felis. Nam blandit quam ut lacus. Quisque ornare risus quis  ligula. Phasellus tristique purus a augue condimentum adipiscing. Aenean  sagittis. Etiam leo pede, rhoncus venenatis, tristique in, vulputate at,  odio. Donec et ipsum et sapien vehicula nonummy. Suspendisse potenti. Fusce  varius urna id quam. Sed neque mi, varius eget, tincidunt nec, suscipit id,  libero. In eget purus. Vestibulum ut nisl. Donec eu mi sed turpis feugiat  feugiat. Integer turpis arcu, pellentesque eget, cursus et, fermentum ut,  sapien. Fusce metus mi, eleifend sollicitudin, molestie id, varius et, nibh.  Donec nec libero. </p>
';

set_page_info_autorun($pages_array,$page_info_arr);
function set_page_info_autorun($pages_array,$page_info_arr_arg)
{
	global $post_author,$wpdb;
	$last_tt_id = 1;
	if(count($pages_array)>0)
	{
		$page_info_arr = array();
		for($p=0;$p<count($pages_array);$p++)
		{
			if(is_array($pages_array[$p]))
			{
				for($i=0;$i<count($pages_array[$p]);$i++)
				{
					$page_info_arr1 = array();
					$page_info_arr1['post_title'] = $pages_array[$p][$i];
					$page_info_arr1['post_content'] = $page_info_arr_arg[$pages_array[$p][$i]];
					$page_info_arr1['post_parent'] = $pages_array[$p][0];
					$page_info_arr[] = $page_info_arr1;
				}
			}
			else
			{
				$page_info_arr1 = array();
				$page_info_arr1['post_title'] = $pages_array[$p];
				$page_info_arr1['post_content'] = $page_info_arr_arg[$pages_array[$p]];
				$page_info_arr1['post_parent'] = '';
				$page_info_arr[] = $page_info_arr1;
			}
		}

		if($page_info_arr)
		{
			for($j=0;$j<count($page_info_arr);$j++)
			{
				$post_title = $page_info_arr[$j]['post_title'];
				$post_content = addslashes($page_info_arr[$j]['post_content']);
				$post_parent = $page_info_arr[$j]['post_parent'];
				if($post_parent!='')
				{
					$post_parent_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like \"$post_parent\" and post_type='page'");
				}else
				{
					$post_parent_id = 0;
				}
				$post_date = date('Y-m-d H:s:i');
				$post_name = strtolower(str_replace(array("'",'"',"?",".","!","@","#","$","%","^","&","*","(",")","-","+","+"," "),array('-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-','-'),$post_title));
				$post_name_count = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts where post_title like \"$post_title\" and post_type='page'");
				if($post_name_count>0)
				{
					echo '';
				}else
				{
					$post_sql = "insert into $wpdb->posts (post_author,post_date,post_date_gmt,post_title,post_content,post_name,post_parent,post_type) values (\"$post_author\", \"$post_date\", \"$post_date\",  \"$post_title\", \"$post_content\", \"$post_name\",\"$post_parent_id\",'page')";
					$wpdb->query($post_sql);
					$last_post_id = $wpdb->get_var("SELECT max(ID) FROM $wpdb->posts");
					$guid = get_option('siteurl')."/?p=$last_post_id";
					$guid_sql = "update $wpdb->posts set guid=\"$guid\" where ID=\"$last_post_id\"";
					$wpdb->query($guid_sql);
					$ter_relation_sql = "insert into $wpdb->term_relationships (object_id,term_taxonomy_id) values (\"$last_post_id\",\"$last_tt_id\")";
					$wpdb->query($ter_relation_sql);
					update_post_meta( $last_post_id, 'pt_dummy_content', 1 );
				}
			}
		}
	}
}
//=====================================================================
$photo_page_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'Advanced Search' and post_type='page'");
update_post_meta( $photo_page_id, '_wp_page_template', 'tpl_advanced_search.php' );

$photo_page_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'Shortcodes' and post_type='page'");
update_post_meta( $photo_page_id, '_wp_page_template', 'tpl_right_sidebar_page.php' );

$photo_page_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'Archives' and post_type='page'");
update_post_meta( $photo_page_id, '_wp_page_template', 'tpl_archives.php' );

$photo_page_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'Left Sidebar Page' and post_type='page'");
update_post_meta( $photo_page_id, '_wp_page_template', 'tpl_right_sidebar_page.php' );

$photo_page_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'Sitemap' and post_type='page'");
update_post_meta( $photo_page_id, '_wp_page_template', 'tpl_sitemap.php' );

$photo_page_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'Contact Us' and post_type='page'");
update_post_meta( $photo_page_id, '_wp_page_template', 'tpl_contact.php' );

$wp_upload_dir = wp_upload_dir();
$basedir = $wp_upload_dir['basedir'];
$baseurl = $wp_upload_dir['baseurl'];
$folderpath = $basedir."/dummy/";
full_copy( TEMPLATEPATH."/images/dummy/", $folderpath );
function full_copy( $source, $target ) 
{
	$imagepatharr = explode('/',str_replace(TEMPLATEPATH,'',$target));
	for($i=0;$i<count($imagepatharr);$i++)
	{
	  if($imagepatharr[$i])
	  {
		  $year_path = ABSPATH.$imagepatharr[$i]."/";
		  if (!file_exists($year_path) && strstr($year_path,"wp-content")){
			 @mkdir($year_path, 0777);
		  }     
		}
	}
	if ( is_dir( $source ) ) {
		@mkdir( $target );
		$d = dir( $source );
		while ( FALSE !== ( $entry = $d->read() ) ) {
			if ( $entry == '.' || $entry == '..' ) {
				continue;
			}
			$Entry = $source . '/' . $entry; 
			if ( is_dir( $Entry ) ) {
				full_copy( $Entry, $target . '/' . $entry );
				continue;
			}
			@copy( $Entry, $target . '/' . $entry );
		}
	
		$d->close();
	}else {
		@copy( $source, $target );
	}
}


///////////////////////////////////////////////////////////////////////////////////
//====================================================================================//




/////////////// WIDGET SETTINGS START ///////////////

$sidebars_widgets = get_option('sidebars_widgets');  //collect widget informations
$sidebars_widgets = array();


////////////////Top Strip//////////////////////
$widget_templ_top_strip_contact = array();
$widget_templ_top_strip_contact[1] = array(
					"ts_contact_text"			=>	'For reservation, call 2222 222',				
					);
$widget_templ_top_strip_contact['_multiwidget'] = '1';
update_option('widget_widget_templ_top_strip_contact',$widget_templ_top_strip_contact);
$widget_templ_top_strip_contact = get_option('widget_widget_templ_top_strip_contact');
krsort($widget_templ_top_strip_contact);
foreach($widget_templ_top_strip_contact as $key1=>$val1)
{
	$widget_templ_top_strip_contact_key = $key1;
	if(is_int($widget_templ_top_strip_contact_key))
	{
		break;
	}
}

$widget_templ_top_strip_social = array();
$widget_templ_top_strip_social[1] = array(
					"ts_social_twitter"		=>	'#',
					"ts_social_fb"			=>	'#',
					"ts_social_linkedin"	=>	'#',
					"ts_social_rss"			=>	'#',
					);
$widget_templ_top_strip_social['_multiwidget'] = '1';
update_option('widget_widget_templ_top_strip_social',$widget_templ_top_strip_social);
$widget_templ_top_strip_social = get_option('widget_widget_templ_top_strip_social');
krsort($widget_templ_top_strip_social);
foreach($widget_templ_top_strip_social as $key1=>$val1)
{
	$widget_templ_top_strip_social_key = $key1;
	if(is_int($widget_templ_top_strip_social_key))
	{
		break;
	}
}

$sidebars_widgets["top_strip"] = array("widget_templ_top_strip_contact-$widget_templ_top_strip_contact_key","widget_templ_top_strip_social-$widget_templ_top_strip_social_key");



////////////////Home Page Sidebar//////////////////////

$widget_templ_side_logo = array();
$widget_templ_side_logo[1] = array(
					"ts_contact_text"			=>	'',				
					);
$widget_templ_side_logo['_multiwidget'] = '1';
update_option('widget_widget_templ_side_logo',$widget_templ_side_logo);
$widget_templ_side_logo = get_option('widget_widget_templ_side_logo');
krsort($widget_templ_side_logo);
foreach($widget_templ_side_logo as $key1=>$val1)
{
	$widget_templ_side_logo_key = $key1;
	if(is_int($widget_templ_side_logo_key))
	{
		break;
	}
}


$categories = array();
$categories[1] = array(
					"title"		    =>	'Categories',
					"count"			=>	'0',
					"hierarchical"	=>	'0',
					"dropdown"		=>	'0',			
					);
$categories['_multiwidget'] = '1';
update_option('widget_categories',$categories);
$categories = get_option('widget_categories');
krsort($categories);
foreach($categories as $key1=>$val1)
{
	$categories_key = $key1;
	if(is_int($categories_key))
	{
		break;
	}
}

$widget_templ_booking_form = array();
$widget_templ_booking_form[1] = array(
					"title"		    =>	'Book Online',
					"desc"			=>	'<p>Book Treatments and Services </p>',		
					);
$widget_templ_booking_form['_multiwidget'] = '1';
update_option('widget_widget_templ_booking_form',$widget_templ_booking_form);
$widget_templ_booking_form = get_option('widget_widget_templ_booking_form');
krsort($widget_templ_booking_form);
foreach($widget_templ_booking_form as $key1=>$val1)
{
	$widget_templ_booking_form_key = $key1;
	if(is_int($widget_templ_booking_form_key))
	{
		break;
	}
}

$sidebars_widgets["index_page_sidebar"] = array("widget_templ_side_logo-$widget_templ_side_logo_key","categories-$categories_key","widget_templ_booking_form-$widget_templ_booking_form_key");





////////////////Home content Right side //////////////////////
$widget_templ_home_slider = array();
$widget_templ_home_slider[1] = array(
					"slider_img_1"		=>	$dummy_image_path.'img1.jpg',
					"slider_img_2"		=>	$dummy_image_path.'img2.jpg',
					"slider_img_3"		=>	$dummy_image_path.'img3.jpg',
					"slider_img_4"		=>	$dummy_image_path.'img4.jpg',
					"slider_img_5"		=>	$dummy_image_path.'img5.jpg',
					"slider_cap_1"		=>	'Welcome to Indian Spa Salon',
					"slider_cap_2"		=>	'Caption 2',
					"slider_cap_3"		=>	'Caption 3',
					"slider_cap_4"		=>	'Caption 4',
					"slider_cap_5"		=>	'Caption 5',			
					);
$widget_templ_home_slider['_multiwidget'] = '1';
update_option('widget_widget_templ_home_slider',$widget_templ_home_slider);
$widget_templ_home_slider = get_option('widget_widget_templ_home_slider');
krsort($widget_templ_home_slider);
foreach($widget_templ_home_slider as $key1=>$val1)
{
	$widget_templ_home_slider_key = $key1;
	if(is_int($widget_templ_home_slider_key))
	{
		break;
	}
}


$text5 = array();
$text5[5] = array(
					"title"				=>	'Welcome to Spa Salon',
					"text"				=>	'<p>Welcome to The Spa Salon, Thailand. The Spa Resort on Island (founded in 1892) was the first Health Destination Resort in Thailand. We have Health Destination Resorts on Samui, Chang, and our latest flagship resort (The Spa Resort) overlooking idyllic rice paddies adjacent to a rural Thai Village in Thailand.</p>

<p>We have developed and perfected specialized programs in Cleansing Detox, Weight Loss, Yoga, Meditation, and have Massage, Vegetarian, Vegan and, Raw foods. Our unique Detox Retreats, Yoga Retreats and Raw Food classes are all part of our Five Habit System to Longevity</p>',
					);
$text5['_multiwidget'] = '1';
update_option('widget_text',$text5);
$text5 = get_option('widget_text');
krsort($text5);
foreach($text5 as $key1=>$val1)
{
	$text_key = $key5;
	if(is_int($text_key5))
	{
		break;
	}
}

$sidebars_widgets["index_page_content"] = array("widget_templ_home_slider-$widget_templ_home_slider_key","text-$text_key5");





////////////////Home page pre footer left //////////////////////
$widget_templ_home_pre_footer_offers = array();
$widget_templ_home_pre_footer_offers[1] = array(
					"offer_image"		=>	$dummy_image_path.'Templatic-Theme-Gallery.png',
					"offer_title"		=>	'Spa Special Offers',
					"offer_subtitle"	=>	'Wordpress Themes Club',
					"offer_desc"		=>	'The Templatic <a href="http://templatic.com/premium-themes-club/">Wordpress Themes Club</a> membership is ideal for any WordPress developer and freelancer that needs access to a wide variety of Wordpress themes. This themes collection saves you hundreds of dollars and also gives you the fantastic deal of allowing you to install any of our themes on unlimited domains.',
					"offer_readmore_link_url"		=>	'http://templatic.com/wordpress-themes-store/',
					"offer_readmore_link_text"		=>	'Read More &raquo;',			
					);
$widget_templ_home_pre_footer_offers['_multiwidget'] = '1';
update_option('widget_widget_templ_home_pre_footer_offers',$widget_templ_home_pre_footer_offers);
$widget_templ_home_pre_footer_offers = get_option('widget_widget_templ_home_pre_footer_offers');
krsort($widget_templ_home_pre_footer_offers);
foreach($widget_templ_home_pre_footer_offers as $key1=>$val1)
{
	$widget_templ_home_pre_footer_offers_key = $key1;
	if(is_int($widget_templ_home_pre_footer_offers_key))
	{
		break;
	}
}


$sidebars_widgets["index_pre_footer_left"] = array("widget_templ_home_pre_footer_offers-$widget_templ_home_pre_footer_offers_key");



////////////////Home page pre footer Right //////////////////////
/*echo "<pre>";
print_r(get_option('sidebars_widgets'));
print_r(get_option('widget_widget_templ_home_pre_footer_contact'));
exit;*/


$widget_templ_home_pre_footer_contact = array();
$widget_templ_home_pre_footer_contact[1] = array(
					"contact_title"			=>	'For Reservation Call',
					"contact_phoneno_one"	=>	'0844 575 8888',
					"contact_phoneno_two"	=>	'0844 575 8888',
					"contact_time_one"		=>	'Monday - Friday 11:00 am to 3:00 pm',
					"contact_time_two"		=>	'Friday - Saturday 1:00 pm to 3:00 pm',
					);
$widget_templ_home_pre_footer_contact['_multiwidget'] = '1';
update_option('widget_widget_templ_home_pre_footer_contact',$widget_templ_home_pre_footer_contact);
$widget_templ_home_pre_footer_contact = get_option('widget_widget_templ_home_pre_footer_contact');
krsort($widget_templ_home_pre_footer_contact);
foreach($widget_templ_home_pre_footer_contact as $key1=>$val1)
{
	$widget_templ_home_pre_footer_contact_key = $key1;
	if(is_int($widget_templ_home_pre_footer_contact_key))
	{
		break;
	}
}


$sidebars_widgets["index_pre_footer_right"] = array("widget_templ_home_pre_footer_contact-$widget_templ_home_pre_footer_contact_key");


////////////////Home Page Sidebar//////////////////////

$widget_templ_side_logo = array();
$widget_templ_side_logo[1] = array(
					"ts_contact_text"			=>	'',				
					);
$widget_templ_side_logo['_multiwidget'] = '1';
update_option('widget_widget_templ_side_logo',$widget_templ_side_logo);
$widget_templ_side_logo = get_option('widget_widget_templ_side_logo');
krsort($widget_templ_side_logo);
foreach($widget_templ_side_logo as $key1=>$val1)
{
	$widget_templ_side_logo_key = $key1;
	if(is_int($widget_templ_side_logo_key))
	{
		break;
	}
}


$categories = array();
$categories[1] = array(
					"title"		    =>	'Categories',
					"count"			=>	'0',
					"hierarchical"	=>	'0',
					"dropdown"		=>	'0',			
					);
$categories['_multiwidget'] = '1';
update_option('widget_categories',$categories);
$categories = get_option('widget_categories');
krsort($categories);
foreach($categories as $key1=>$val1)
{
	$categories_key = $key1;
	if(is_int($categories_key))
	{
		break;
	}
}

$widget_templ_booking_form = array();
$widget_templ_booking_form[1] = array(
					"title"		    =>	'Book Online',
					"desc"			=>	'<p>Book Treatments, Services or 
Classes Instantly</p>',		
					);
$widget_templ_booking_form['_multiwidget'] = '1';
update_option('widget_widget_templ_booking_form',$widget_templ_booking_form);
$widget_templ_booking_form = get_option('widget_widget_templ_booking_form');
krsort($widget_templ_booking_form);
foreach($widget_templ_booking_form as $key1=>$val1)
{
	$widget_templ_booking_form_key = $key1;
	if(is_int($widget_templ_booking_form_key))
	{
		break;
	}
}

$sidebars_widgets["sidebar1"] = array("widget_templ_side_logo-$widget_templ_side_logo_key","categories-$categories_key","widget_templ_booking_form-$widget_templ_booking_form_key");


//===============================================================================
//////////////////////////////////////////////////////
update_option('sidebars_widgets',$sidebars_widgets);  //save widget iformations
/////////////// WIDGET SETTINGS END /////////////

//=====================================================================
/////////////// Design Settings START ///////////////


// General settings start  /////
update_option("ptthemes_alt_stylesheet",'1-default');
update_option("ptthemes_show_blog_title",'No');
update_option("ptthemes_feedburner_url",'http://feeds2.feedburner.com/templatic');
update_option("ptthemes_feedburner_id",'templatic/ekPs');
update_option("ptthemes_tweet_button",'Yes');
update_option("ptthemes_facebook_button",'Yes');
update_option("ptthemes_date_format",'M j, Y');
update_option("pttheme_contact_email",'info@mysite.com');
update_option("ptthemes_breadcrumbs",'Yes');
update_option("ptthemes_auto_install",'No');
update_option("ptthemes_postcontent_full",'Excerpt');
update_option("ptthemes_content_excerpt_count",'40');
update_option("ptthemes_content_excerpt_readmore",'Read More &rarr;');
// General settings End  /////

// Navigation settings
update_option("ptthemes_main_pages_nav_enable",'Deactivate');
// Navigation settings

// Seo option
update_option("pttheme_seo_hide_fields",'No');
update_option("ptthemes_use_third_party_data",'No');
// Seo option 

// Post  option
update_option("ptthemes_home_page",'6');
update_option("ptthemes_cat_page",'6');
update_option("ptthemes_search_page",'6');
update_option("ptthemes_pagination",'Default + WP Page-Navi support');
// Post  option 

//Navigation  
$page_id1 = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'About' and post_type='page'");
$page_id2 = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'Contcat Us' and post_type='page'");
$page_id3 = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'Sub Page 1' and post_type='page'");
$page_id4 = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'Sub Page 2' and post_type='page'");

$page_id5 = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'Archives' and post_type='page'");
$page_id6 = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'Gallery' and post_type='page'");
$page_id7 = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'Site Map' and post_type='page'");
$page_id8 = $wpdb->get_var("SELECT ID FROM $wpdb->posts where post_title like 'Page Left Sidebar' and post_type='page'");

$pages_ids = $page_id1.",".$page_id2.",".$page_id3.",".$page_id4.",".$page_id5.",".$page_id6.",".$page_id7.",".$page_id8;
update_option("ptthemes_top_pages_nav",$pages_ids);
//Navigation  

// Page Layout
update_option("ptthemes_page_layout",'Page 2 column - Left Sidebar');
update_option("ptthemes_bottom_options",'-- Choose One --');
// Page Layout

if($_REQUEST['dump']==1){
echo "<script>";
echo "window.location.href='".get_option('siteurl')."/wp-admin/themes.php?dummy_insert=1'";
echo "</script>";
}
/////////////// Design Settings END ///////////////
//====================================================================================//

/* ======================== CODE TO ADD RESIZED IMAGES ======================= */
regenerate_all_attachment_sizes();
 
function regenerate_all_attachment_sizes() {
	$args = array( 'post_type' => 'attachment', 'numberposts' => 100, 'post_status' => 'attachment'); 
	$attachments = get_posts( $args );
	if ($attachments) {
		foreach ( $attachments as $post ) {
			$file = get_attached_file( $post->ID );
			wp_update_attachment_metadata( $post->ID, wp_generate_attachment_metadata( $post->ID, $file ) );
		}
	}		
}
?>
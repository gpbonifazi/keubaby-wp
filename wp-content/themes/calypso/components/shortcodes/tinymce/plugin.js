(function($) {
"use strict"; 
 			//Shortcodes
            tinymce.PluginManager.add( 'zillaShortcodes', function( editor, url ) {
				
     
                editor.addButton( 'zilla_button', {
                    type: 'splitbutton',
                    icon: false,
					title:  'Wow Shortcodes',
					onclick : function(e) {},
					menu: [
					
					// COLUMNS
					{text: 'Layout',onclick:function(){},
						menu: [							
							{
								text: 'Container',
								onclick: function(){
								   tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[container]' + tinyMCE.activeEditor.selection.getContent() + '[/container]');
								}
							},
							
							
							{
								text: 'Row',
								onclick: function(){
								   tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[row]' + tinyMCE.activeEditor.selection.getContent() + '[/row]');
								}
							},
							
							
							{
								text: 'One Half',
								onclick: function(){
								   tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[col size="6"]' + tinyMCE.activeEditor.selection.getContent() + '[/col]');
								}
							},
							
							{
								text: 'One Third',
								onclick: function(){
									tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[col size="4"]' + tinyMCE.activeEditor.selection.getContent() + '[/col]');
								}
							},
							
							{
								text: 'One Fourth',
								onclick: function(){
									tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[col size="3"]' + tinyMCE.activeEditor.selection.getContent() + '[/col]'); 
								}
							},
							
							{
								text: 'One Sixth',
								onclick: function(){
									tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[col size="2"]' + tinyMCE.activeEditor.selection.getContent() + '[/col]'); 
								}
							},
							
							{
								text: 'Full',
								onclick: function(){
									tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[col size="12"]' + tinyMCE.activeEditor.selection.getContent() + '[/col]');
								}
							},
 
							]
					},
					
					// TEXT FEATURES
					{text: 'Text Features',onclick:function(){},
						menu: [							
							{
								text: 'Button',
								onclick: function(){
								   tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[button type="primary/default/info/danger/warning/sucess/inverse/simple/white" size="md" url="#" target="" text="Purchase Now" icon="" animtype="bounceIn"]');
								}
							},
							
							{
								text: 'Alert',
								onclick: function(){
								    tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_alert type="success/info/danger/warning" heading="Success!"]...' + tinyMCE.activeEditor.selection.getContent() + '[/wow_alert]'); 
								}
							},
							
							{
								text: 'Icon',
								onclick: function(){
								   tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_icon type="star" size="13"]');
								}
							},						
							
							{
								text: 'List',
								onclick: function(){
									tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_list style="check/circleok/arrow/star/doublearrow/chevron/hand/thumb/asterisk/circlearrow/circleplus/longarrow"]<li>Cars</li><li>Dolls</li>[/wow_list]');
								}
							},
							
							{
								text: 'Color me',
								onclick: function(){
									tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_colorme]'+tinyMCE.activeEditor.selection.getContent()+'[/wow_colorme]'); 
								}
							},
							
							{
								text: 'Panel/Quote',
								onclick: function(){
								    tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_panel color="#00cfef"]' + tinyMCE.activeEditor.selection.getContent() + '[/wow_panel]'); 
								}
							},
							
							
							{text: 'Preformatted Text',
								onclick: function(){
								   tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_pre]...' + tinyMCE.activeEditor.selection.getContent() + '[/wow_pre]'); 
								}
							},
							
							{text: 'Narrow Text',
								onclick: function(){
								   tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_max width="80%" align="left/center"]...' + tinyMCE.activeEditor.selection.getContent() + '[/wow_max]'); 
								}
							},
							
							{text: 'Arrow',
								onclick: function(){
								   tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_arrow to="up/down" id="#"]'); 
								}
							},
							
							
 
							]
					},
					
					// ELEMENTS
					{text: 'Elements',onclick:function(){},
						menu: [							
							
							{
								text: 'Accordion',
								onclick: function(){
								   tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[collapsibles]<br/>[collapse title="Collapse 1" state="active"]…[/collapse]<br/>[collapse title="Copllapse 2"]…[/collapse]<br/>[collapse title="Copllapse 3"]…[/collapse]<br/>[/collapsibles]'); 
								}
							},
							
							{
								text: 'Counter',
								onclick: function(){
								    tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_count number="1254" icon="trophy" title="Happy Clients"]'); 
								}
							},					
							
							
							{
								text: 'Tabs',
								onclick: function(){
									tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[tabs]<br/>[tab title="Home"]…[/tab]<br/>[tab title="Profile"]…[/tab]<br/>[tab title="Messages"]…[/tab]<br/>[/tabs]'); 
								}
							},
							
							{
								text: 'Table',
								onclick: function(){
									tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[table type="striped" cols=" #,First Name, Last Name, Username" data=" 1, Filip, Stefansson, filipstefansson, 2, Victor, Meyer, Pudge, 3, Måns, Ketola-Backe, mossboll"]'); 
								}
							},
							
							
							{
								text: 'Toggle',
								onclick: function(){
									tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_toggle title="Your title or question"]Your content or answer[/wow_toggle]');
								}
							},
							
							{
								text: 'Progress Bars',
								onclick: function(){
									 tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_skills]<br/>[skill width="100%" icon="legal" text="Legal Issues"]<br/>[skill width="80%" icon="bolt" text="Economic Stuff"]<br/>[/wow_skills]');
								}
							},
							
							{
								text: 'Team Box',
								onclick: function(){
									tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_teambox name="John Doe" position="Manager at WowThemes" description="Description here" imglink="#"]<br/>[wow_social icon="facebook" link="#"]<br/>[wow_social icon="twitter" link="#"]<br/>[/wow_teambox]'); 
								}
							},						
							
							{
								text: 'Pricing Boxes',
								onclick: function(){
									tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_pricing_table size="col-md-3"]<br/>[wow_pricing plan="Gold" featured="no" cost="$29.99" per="per month" button_url="#" button_text="Sign Up" button_target="self" button_rel="nofollow"]<ul><li>5 products</li><li>1 image per product</li><li>basic stats</li><li>non commercial</li></ul>[/wow_pricing]<br/>[/wow_pricing_table]'); 
								}
							},
							
 
							]
					},
					
					// SECTIONS
					{text: 'Sections',onclick:function(){},
						menu: 
						[							
							
							{text: 'Big Text Block 1',
								onclick: function(){
								   tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_block]<br/><br/>[wow_textmedium type="bounceIn" after="0s" duration="1s"]MultiPurpose Theme Suitable for any kind of business[/wow_textmedium]<br/>[wow_textbig type="zoomIn" after="0.4s" duration="2s"]Build your website in no minute with Zolix.[/wow_textbig]<br/>[wow_textsmall type="rotateIn" after="0.7s" duration="1s"]Wow Themes.Net Development[/wow_textsmall]<br/><br/>[/wow_block]'); 
								}
							},
							
							
							{text: 'Big Text Block 2',
								onclick: function(){
								   tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_block2]<br/><br/>[wow_textbig type="zoomIn" after="0.4s" duration="2s"]This is Zolix.[/wow_textbig]<br/>[wow_textmedium type="bounceIn" after="0s" duration="1s"]MultiPurpose Theme Suitable for any kind of business[/wow_textmedium]<br/>[button type="default" size="lg" url="#" text="Learn More" icon="microphone" animtype="bounceIn"]<br/><br/>[/wow_block2]'); 
								}
							},
							
							
						
						]
					},
				
					
					// SLIDERS
					{text: 'Sliders',onclick:function(){},
						menu: [

							
							{
								text: 'Big Intro Home Slider',
								onclick: function(){
									tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_animslider]<br/><br/><br/>[animtext padding="120px" color="#444444" align="center"]<br/>[animtitle type="zoomIn" after="0s" duration="1s"]This is Zolix[/animtitle]<br/>[animsubtitle type="zoomIn" after="0.9s" duration="2s"]Powerful wordpress theme with lots of features[/animsubtitle]<br/>[animbutton colored="no" type="rollIn" after="0.9s" duration="1s" icon="flask" text="Get Started" link="#"]<br/>[/animtext]<br/><br/>[animtext padding="120px" color="#444444" align="center"]<br/>[animtitle type="zoomIn" after="0s" duration="1s"]Flexible & Creative[/animtitle]<br/>[animsubtitle type="zoomIn" after="0.6s" duration="1.5s"]Zolix is packed with everything[/animsubtitle]<br/>[animbutton colored="no" type="slideInLeft" after="0.9s" duration="1s" icon="share" text="Learn More" link="#"]<br/>[animbutton colored="yes" type="slideInRight" after="0.9s" duration="1s" icon="download" text="Get it now" link="#"]<br/>[/animtext]<br/><br/><br/>[/wow_animslider]'); 
								}
							},
 
							]
					},
					
					
					// BOXES
					{text: 'Boxes',onclick:function(){},
						
						menu: [						
					
							{text: 'Features',onclick:function(){},
								menu: 
									[											
										{
											text: 'Style 1',
											onclick: function(){
											   tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wowfeatures icon="fire" title="Some Title" description="Some Description" anim="fadeInLeft" after="0.1"]...' + tinyMCE.activeEditor.selection.getContent() + '[/wowfeatures]'); 
											}
										},							
										
										{
											text: 'Style 2',
											onclick: function(){
											   tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wowfeatures icon="fire" title="Some Title" nofill="yes" description="Some Description" anim="fadeInLeft" after="0.1"]...' + tinyMCE.activeEditor.selection.getContent() + '[/wowfeatures]'); 
											}
										},
										
										{
											text: 'Style 3',
											onclick: function(){
											   tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wowfeatures icon="fire" title="Some Title" nofill="yes" black="yes" description="Some Description" anim="fadeInLeft" after="0.1"]...' + tinyMCE.activeEditor.selection.getContent() + '[/wowfeatures]'); 
											}
										},
										
										{
											text: 'Style 4',
											onclick: function(){
											   tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wowfeatures icon="fire" title="Some Title" blackfill="yes" description="Some Description" anim="fadeInLeft" after="0.1"]...' + tinyMCE.activeEditor.selection.getContent() + '[/wowfeatures]'); 
											}
										},
										
										{
											text: '3 Columns Example',
											onclick: function(){
											   tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[col size="4"]<br/>[wowfeatures icon="fire" title="Some Title" blackfill="yes" description="Some Description" anim="fadeInLeft" after="0.1"]...[/wowfeatures]<br/>[/col]<br/><br/>[col size="4"]<br/>[wowfeatures icon="fire" title="Some Title" nofill="yes" black="yes" description="Some Description" anim="fadeInLeft" after="0.2"]...[/wowfeatures]<br/>[/col]<br/><br/>[col size="4"]<br/>[wowfeatures icon="fire" title="Some Title" description="Some Description" anim="fadeInLeft" after="0.3"]...[/wowfeatures]<br/>[/col]<br/><br/>[wow_clear]'); 
											}
										},
										
										{
											text: '4 Columns Example',
											onclick: function(){
											   tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[col size="3"]<br/>[wowfeatures icon="fire" title="Some Title" blackfill="yes" description="Some Description" anim="fadeInLeft" after="0.1"]...[/wowfeatures]<br/>[/col]<br/><br/>[col size="3"]<br/>[wowfeatures icon="fire" title="Some Title" nofill="yes" black="yes" description="Some Description" anim="fadeInLeft" after="0.2"]...[/wowfeatures]<br/>[/col]<br/><br/>[col size="3"]<br/>[wowfeatures icon="fire" title="Some Title" description="Some Description" anim="fadeInLeft" after="0.3"]...[/wowfeatures]<br/>[/col]<br/><br/>[col size="3"]<br/>[wowfeatures icon="fire" title="Some Title" nofill="yes" description="Some Description" anim="fadeInLeft" after="0.4"]...[/wowfeatures]<br/>[/col]<br/><br/>[wow_clear]'); 
											}
										},
										
										
										
									]
							},
							
							// SERVICES
							{text: 'Fancy Services',onclick:function(){},
								menu: [							
									{
										text: 'Service Left',
										onclick: function(){
										   tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[serviceleft icon="fire" title="Some Title" anim="fadeInLeft" after="0.1"]...content here...[/serviceleft]'); 
										}
									},							
									
									{
										text: 'Service Right',
										onclick: function(){
										  tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[serviceright icon="cogs" title="Some Title" anim="fadeInRight" after="0.1"]...content here...[/serviceright]'); 
										}
									},
									
									{
										text: 'Full Service Example',
										onclick: function(){
											tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[col size="6"]<br/>[serviceleft icon="fire" title="Clean Design" anim="fadeInLeft" after="0.1"]Lorem ipsum dolor[/serviceleft]<br/>[serviceleft icon="font" title="Awesome Features" anim="fadeInLeft" after="0.3"]The art and technique[/serviceleft]<br/>[/col]<br/>[col size="6"]<br/>[serviceright icon="fire" title="Clean Design" anim="fadeInRight" after="0.1"]Lorem ipsum dolor.[/serviceright]<br/>[serviceright icon="font" title="Awesome Features" anim="fadeInRight" after="0.3"]The art and technique.[/serviceright]<br/>[/col]<br/>[wow_clear]'); 
										}
									},
		 
									]
							},
							
							
						{text: 'Small Icon Services',onclick:function(){},
								menu: 
									[
										{
											text: 'Style 2',
											onclick: function(){
											   tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_service2 icon="fire" title="Some Title" anim="fadeInLeft" after="0.1"]...' + tinyMCE.activeEditor.selection.getContent() + '[/wow_service2]'); 
											}
										},
										

										{
											text: 'Style 3',
											onclick: function(){
											   tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_service3 icon="fire" title="Some Title" anim="fadeInLeft" after="0.1"]...' + tinyMCE.activeEditor.selection.getContent() + '[/wow_service3]'); 
											}
										},
										
										{
											text: 'Style 4',
											onclick: function(){
											   tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_service4 icon="fire" title="Some Title" anim="fadeInLeft" after="0.1"]...' + tinyMCE.activeEditor.selection.getContent() + '[/wow_service4]'); 
											}
										},
										
										{
											text: 'Style 5',
											onclick: function(){
											   tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_service5 icon="fire" title="Some Title" anim="fadeInLeft" after="0.1"]...' + tinyMCE.activeEditor.selection.getContent() + '[/wow_service5]'); 
											}
										},
										
										{
											text: '3 Columns Example',
											onclick: function(){
											   tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[col size="4"]<br/>[wow_service2 icon="spotify" title="Some Title" anim="bounceIn" after="0.1"]Id like to share with you a bunch of great shortcodes we have put together.[/wow_service2]<br/>[/col]<br/><br/>[col size="4"]<br/>[wow_service2 icon="jsfiddle" title="Some Title" anim="bounceIn" after="0.2"]Id like to share with you a bunch of great shortcodes weve put together.[/wow_service2]<br/>[/col]<br/><br/>[col size="4"][wow_service2 icon="support" title="Some Title" anim="bounceIn" after="0.3"]Id like to share with you a bunch of great shortcodes weve put together.[/wow_service2]<br/>[/col]<br/><br/>[wow_clear]'); 
											}
										},
										
										{
											text: '4 Columns Example',
											onclick: function(){
											   tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[col size="3"]<br/>[wow_service2 icon="spotify" title="Some Title" anim="bounceIn" after="0.1"]Id like to share with you a bunch of great shortcodes we have put together.[/wow_service2]<br/>[/col]<br/><br/>[col size="3"]<br/>[wow_service2 icon="jsfiddle" title="Some Title" anim="bounceIn" after="0.2"]Id like to share with you a bunch of great shortcodes weve put together.[/wow_service2]<br/>[/col]<br/><br/>[col size="3"][wow_service2 icon="support" title="Some Title" anim="bounceIn" after="0.3"]Id like to share with you a bunch of great shortcodes weve put together.[/wow_service2]<br/>[/col]<br/><br/>[col size="3"]<br/>[wow_service2 icon="microphone" title="Some Title" anim="bounceIn" after="0.4"]Id like to share with you a bunch of great shortcodes we have put together.[/wow_service2]<br/>[/col]<br/><br/>[wow_clear]'); 
											}
										},
									
									]

						}
 
							
					
						]
					
					
					},
					
					
					// OTHER
					{text: 'Other',onclick:function(){},
						
						menu: [						
						
							
							{
								text: 'Recent Posts',
								onclick: function(){
									 tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_recent-posts bloglink="#" invite="Enter Blog" icon="fa-arrow-right"]'); 
								}
							},
							
							{
								text: 'Recent Work',
								onclick: function(){
									 tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_recentwork portfoliolink="#" invite="View All Work" icon="fa-arrow-right"]'); 
								}
							},
							
							{
								text: 'Contact Form',
								onclick: function(){
									tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_contact email=youraddress@email.com]'); 
								}
							},
							
							{
								text: 'Clear Floats',
								onclick: function(){
									tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_clear]');
								}
							},
							
							{
								text: 'Spacing',
								onclick: function(){
									tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_spacing size="20px"]');
								}
							},							
							

							{
								text: 'Google Map',
								onclick: function(){
									tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_map lat="42.3314" long="-83.0458" zoom="15" title="Detroit" height="400px"]'); 
								}
							},
							
							{
								text: 'Private Content',
								onclick: function(){
									tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_member]' + tinyMCE.activeEditor.selection.getContent() + '[/wow_member]'); 
								}
							},

							
							{
								text: 'Animation',
								onclick: function(){
									tinyMCE.activeEditor.execCommand('mceInsertContent', false, '[wow_animation type="bounceIn" after="0.2s" duration=0.5s" style="div/span"]...' + tinyMCE.activeEditor.selection.getContent() + '[/wow_animation]'); 
								}
							},
							
							
							
					
					
					]
					},
					
					
					
					
					
					
					
					
					//List more shortcodes like this
					
					]					
                
        	  });
         
          }); 

 
})(jQuery);
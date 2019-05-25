  $(function() {
    tinymce.init({
    selector: '#description',
    width: 800,
    height: 300,
    branding: false,
    content_css : "/webroot/css/custom_content.css",
    extended_valid_elements: 'a[id|class|!href|border|alt|title|width|height|style|onmouseover|onmouseout|onclick]',
    plugins: [
      'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars code fullscreen',
      'insertdatetime media nonbreaking save table contextmenu directionality',
      'emoticons template paste textcolor colorpicker textpattern imagetools'
    ],
    menubar: '',
    paste_as_text: true,
    toolbar1: 'insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent'
   })
  });
   //,toolbar2: 'sorts | talentsautre | talents1 | talents4 | talents7 | talents10 | talents13 | talents16 | talents20',
 //    setup: function(editor) {
 //    var menuautre = [];
 //    for(var i = 0; i < Autre.length; i++){;
      
 //      menuautre.push({text: Autre[i]['nom'],
 //          icon: 'none-'+i,
 //          image: PATH+id+'/'+Autre[i]['image'],
 //          onclick: function() {
 //            nb = this.settings.icon.split('-')[1];
 //             editor.insertContent('<a id="tdautre-'+nb+'" class="talentdescription" href="#" onmouseover="showNameComment(event,this.id)" onmouseout="hideName(this.id)" onclick="event.preventDefault()"><img src="'+PATH+id+'/'+Autre[nb]['image']+'" height="16" width="16">&nbsp;<span class="nomtalentdesc">'+Autre[nb]['nom']+'</span></a>');
 //      }
 //    });
 //  }
 //    var menu1 = [];
 //    for(var i = 0; i < Un.length; i++){;
    	
	//     menu1.push({text: Un[i]['nom'],
	//         icon: 'none-'+i,
	//         image: PATH+id+'/'+Un[i]['image'],
	//         onclick: function() {
	//         	nb = this.settings.icon.split('-')[1];
	// 	         editor.insertContent('<a id="td1-'+nb+'" class="talentdescription" href="#" onmouseover="showNameComment(event,this.id)" onmouseout="hideName(this.id)" onclick="event.preventDefault()"><img src="'+PATH+id+'/'+Un[nb]['image']+'" height="16" width="16">&nbsp;<span class="nomtalentdesc">'+Un[nb]['nom']+'</span></a>');
	// 		}
	// 	});
	// }
 //    var menu4 = [];
 //    for(var i = 0; i < Quatre.length; i++){;
    	
	//     menu4.push({text: Quatre[i]['nom'],
	//         icon: 'none-'+i,
	//         image: PATH+id+'/'+Quatre[i]['image'],
	//         onclick: function() {
	//         nb = this.settings.icon.split('-')[1];
	//           editor.insertContent('<a id="td4-'+nb+'" class="talentdescription" href="#" onmouseover="showNameComment(event,this.id)" onmouseout="hideName(this.id)" onclick="event.preventDefault()"><img src="'+PATH+id+'/'+Quatre[nb]['image']+'" height="16" width="16">&nbsp;<span class="nomtalentdesc">'+Quatre[nb]['nom']+'</span></a>');
	// 		}
	// 	});
	// }
 //    var menu7 = [];
 //    for(var i = 0; i < Sept.length; i++){;
    	
	//     menu7.push({text: Sept[i]['nom'],
	//         icon: 'none-'+i,
	//         image: PATH+id+'/'+Sept[i]['image'],
	//         onclick: function() {
	//         nb = this.settings.icon.split('-')[1];
	//           editor.insertContent('<a id="td7-'+nb+'" class="talentdescription" href="#" onmouseover="showNameComment(event,this.id)" onmouseout="hideName(this.id)" onclick="event.preventDefault()"><img src="'+PATH+id+'/'+Sept[nb]['image']+'" height="16" width="16">&nbsp;<span class="nomtalentdesc">'+Sept[nb]['nom']+'</span></a>');
	// 		}
	// 	});
	// }
 //    var menu10 = [];
 //    for(var i = 0; i < Dix.length; i++){;
    	
	//     menu10.push({text: Dix[i]['nom'],
	//         icon: 'none-'+i,
	//         image: PATH+id+'/'+Dix[i]['image'],
	//         onclick: function() {
	//         	nb = this.settings.icon.split('-')[1];
	//           editor.insertContent('<a id="td10-'+nb+'" class="talentdescription" href="#" onmouseover="showNameComment(event,this.id)" onmouseout="hideName(this.id)" onclick="event.preventDefault()"><img src="'+PATH+id+'/'+Dix[nb]['image']+'" height="16" width="16">&nbsp;<span class="nomtalentdesc">'+Dix[nb]['nom']+'</span></a>');
	// 		}
	// 	});
	// }
 //    var menu13 = [];
 //    for(var i = 0; i < Treize.length; i++){;
    	
	//     menu13.push({text: Treize[i]['nom'],
	//         icon: 'none-'+i,
	//         image: PATH+id+'/'+Treize[i]['image'],
	//         onclick: function() {
	//         	nb = this.settings.icon.split('-')[1];
	//           editor.insertContent('<a id="td13-'+nb+'" class="talentdescription" href="#" onmouseover="showNameComment(event,this.id)" onmouseout="hideName(this.id)" onclick="event.preventDefault()"><img src="'+PATH+id+'/'+Treize[nb]['image']+'" height="16" width="16">&nbsp;<span class="nomtalentdesc">'+Treize[nb]['nom']+'</span></a>');
	// 		}
	// 	});
	// }
 //    var menu16 = [];
 //    for(var i = 0; i < Seize.length; i++){;
    	
	//     menu16.push({text: Seize[i]['nom'],
	//         icon: 'none-'+i,
	//         image: PATH+id+'/'+Seize[i]['image'],
	//         onclick: function() {
	//         	nb = this.settings.icon.split('-')[1];
	//           editor.insertContent('<a id="td16-'+nb+'" class="talentdescription" href="#" onmouseover="showNameComment(event,this.id)" onmouseout="hideName(this.id)" onclick="event.preventDefault()"><img src="'+PATH+id+'/'+Seize[nb]['image']+'" height="16" width="16">&nbsp;<span class="nomtalentdesc">'+Seize[nb]['nom']+'</span></a>');
	// 		}
	// 	});
	// }
 //    var menu20 = [];
 //    for(var i = 0; i < Vingt.length; i++){;
    	
	//     menu20.push({text: Vingt[i]['nom'],
	//         icon: 'none-'+i,
	//         image: PATH+id+'/'+Vingt[i]['image'],
	//         onclick: function() {
	//         	nb = this.settings.icon.split('-')[1];
	//           editor.insertContent('<a id="td20-'+nb+'" class="talentdescription" href="#" onmouseover="showNameComment(event,this.id)" onmouseout="hideName(this.id)" onclick="event.preventDefault()"><img src="'+PATH+id+'/'+Vingt[nb]['image']+'" height="16" width="16">&nbsp;<span class="nomtalentdesc">'+Vingt[nb]['nom']+'</span></a>');
	// 		}
	// 	});
	//}
 //    editor.addButton('sorts', {
 //      type: 'menubutton',
 //      text: 'Sorts',
 //      icon: false,
 //      menu: [{
 //        text: A_nom,
 //        icon: 'none',
 //        image: PATH+id+'/'+A_image,
 //        onclick: function() {
 //          editor.insertContent('<a id="tdA" class="talentdescription" href="#" onmouseover="showNameComment(event,this.id)" onmouseout="hideName(this.id)" onclick="event.preventDefault()"><img src="'+PATH+id+'/'+A_image+'" height="16" width="16">&nbsp;<span class="nomtalentdesc">'+A_nom+'</span></a>');
 //        }
 //      }, {
 //        text: Z_nom,
 //        icon: 'none',
 //        image: PATH+id+'/'+Z_image,
 //        onclick: function() {
 //          editor.insertContent('<a id="tdZ" class="talentdescription" href="#" onmouseover="showNameComment(event,this.id)" onmouseout="hideName(this.id)" onclick="event.preventDefault()"><img src="'+PATH+id+'/'+Z_image+'" height="16" width="16">&nbsp;<span class="nomtalentdesc">'+Z_nom+'</span></a>');
 //        }
 //      },
 //      {
 //        text: E_nom,
 //        icon: 'none',
 //        image: PATH+id+'/'+E_image,
 //        onclick: function() {
 //          editor.insertContent('<a id="tdE" class="talentdescription" href="#" onmouseover="showNameComment(event,this.id)" onmouseout="hideName(this.id)" onclick="event.preventDefault()"><img src="'+PATH+id+'/'+E_image+'" height="16" width="16">&nbsp;<span class="nomtalentdesc">'+E_nom+'</span></a>');
 //        }
 //      },
 //      {
 //        text: D_nom,
 //        icon: 'none',
 //        image: PATH+id+'/'+D_image,
 //        onclick: function() {
 //          editor.insertContent('<a id="tdD" class="talentdescription" href="#" onmouseover="showNameComment(event,this.id)" onmouseout="hideName(this.id)" onclick="event.preventDefault()"><img src="'+PATH+id+'/'+D_image+'" height="16" width="16">&nbsp;<span class="nomtalentdesc">'+D_nom+'</span></a>');
 //        }
 //      }
 //      ]
 //    });
 //    editor.addButton('talentsautre', {
 //      type: 'menubutton',
 //      text: 'Autres',
 //      icon: false,
 //      menu: menuautre
 //    });
 //    editor.addButton('talents1', {
 //      type: 'menubutton',
 //      text: 'Talents 1',
 //      icon: false,
 //      menu: menu1
 //    });
 //    editor.addButton('talents4', {
 //      type: 'menubutton',
 //      text: 'Talents 4',
 //      icon: false,
 //      menu: menu4
 //    });
 //    editor.addButton('talents7', {
 //      type: 'menubutton',
 //      text: 'Talents 7',
 //      icon: false,
 //      menu: menu7
 //    });
 //    editor.addButton('talents10', {
 //      type: 'menubutton',
 //      text: 'Talents 10',
 //      icon: false,
 //      menu: menu10
 //    });
 //    editor.addButton('talents13', {
 //      type: 'menubutton',
 //      text: 'Talents 13',
 //      icon: false,
 //      menu: menu13
 //    });
 //    editor.addButton('talents16', {
 //      type: 'menubutton',
 //      text: 'Talents 16',
 //      icon: false,
 //      menu: menu16
 //    });
 //    editor.addButton('talents20', {
 //      type: 'menubutton',
 //      text: 'Talents 20',
 //      icon: false,
 //      menu: menu20
 //    });
 //  }
	// });
 // });
(function() {
   tinymce.create('tinymce.plugins.ctabutton', {
      init : function(ed, url) {
         ed.addButton('ctabutton', {
            title : 'CTA button',
            text : 'CTA button',
            icon : false, //url+'/recentpostsbutton.png',
            onclick : function() {
               var href = prompt("Url", "/");
               var text = prompt("Text", "Default button");

               if (text !== null && text !== ''){
                  if (href !== null && href !== '')
                     ed.execCommand('mceInsertContent', false, '[cta-button href="'+href+'"]'+text+'[/cta-button]');
                  else
                     ed.execCommand('mceInsertContent', false, '[cta-button]'+text+'[/cta-button]');
               }
               else{
                  if (href !== null && href !== '')
                     ed.execCommand('mceInsertContent', false, '[cta-button posts="'+href+'"]');
                  else
                     ed.execCommand('mceInsertContent', false, '[cta-button]');
               }
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "Insert CTA button",
            author : 'Øyvind Bø',
            authorurl : 'http://www.oyvindbo.com',
            infourl : 'http://www.oiid.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('ctabutton', tinymce.plugins.ctabutton);
})();
/*
* Responsive magic for YouTube videos!
*/
jQuery(document).ready(function($){
 var $youtubeVids = $('iframe[src*="youtube.com"]');
 $youtubeVids.each(function() {
     $(this).data('aspectRatio', this.height / this.width)
         .data('maxWidth', this.width)
         .removeAttr('height')
         .removeAttr('width');
 });
 $(window).resize(function() {
     $youtubeVids.each(function() {
         var width  = Math.min( $(this).closest('.teaser-item').width() , $(this).data('maxWidth') );
         if (!width)
             width  = Math.min( $(this).closest('.g-block').width() , $(this).data('maxWidth') );
         if (!width)
            width = $(this).data('maxWidth');
         var height = width * $(this).data('aspectRatio');
         $(this)
             .width(width)
             .height(height);
     });
 }).resize();
});
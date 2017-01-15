jQuery(document).ready(function($) {

    function expandSection(parent, text1, text2) {
        var parentElem = $(parent),
            childElem = parentElem.find('button');

        childElem.on('click', function () {
            var $this = $(this);
            var textOriginal = text1;
            var textExpanded = text2;

            $this.parents(parent).toggleClass('expanded');

            if ($this.parents(parent).hasClass('expanded')) {
                $this.html(textExpanded);
            } else {
                $this.html(textOriginal);
            }

        });
    }

    expandSection('.static-section', 'Več podrobnosti o meni', 'Manj podrobnosti o meni');

    $('.expand-gallery').on('click', function(){
      var $this = $(this);
      var parentElem = $this.parents('article');
      console.log(parentElem);
      var hiddenRows = parentElem.find('.row-images-extra');

      hiddenRows.toggleClass('show');

      if(hiddenRows.hasClass('show')){
        $this.html('Pokaži manj');
      }
      else {
        $this.html('Pokaži več');
      }

    });

    $('.gallery-image').on('click', function(){
      var image = $(this);
      var imageCanvas = $('.image-canvas');
      var imageUrl = image.attr('src');

      imageCanvas.addClass('active');

      var image = '<img class="gallery-image image-full" src="' + imageUrl + '">';

      imageCanvas.html(image);

      $(imageCanvas).on('click', function(){
        $(this).removeClass('active');
      });





    });


    function scrollTo(btnToClick, elem, duration){
        var button = $(btnToClick);
        var elemToScroll = $(elem);

        console.log(button);
        console.log(elemToScroll);

        button.click(function() {
            $('html, body').animate({
                scrollTop: elemToScroll.offset().top
            }, duration);
        });
    }


    scrollTo('#landing-cta-btn', '#kdo-sem-jaz', 500);
    // scrollTo('#home', '.landing-section', 500);
    // scrollTo('#pasma', '.predstavitev-pasme', 500);
    // scrollTo('#lastnik', '.predstavitev-lastnika', 500);
    // scrollTo('#galerija', '.section-galerija', 500);
    // scrollTo('#blog', '.section-blog', 500);
    // scrollTo('#kontakt', '.kontakt', 500);



});

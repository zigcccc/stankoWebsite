/**
 * Created by zkrasovec on 14/11/2016.
 */
$(document).ready(function () {

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


    expandSection('.predstavitev-pasme', 'Več podrobnosti o meni', 'Manj podrobnosti o meni');

    expandSection('.predstavitev-lastnika', 'Več o osebi ki me hrani', 'Manj o osebi ki me hrani');



    function scrollTo(btnToClick, elem, duration){
        var button = $(btnToClick);
        var elemToScroll = $(elem);

        button.click(function() {
            $('html, body').animate({
                scrollTop: elemToScroll.offset().top
            }, duration);
        });
    }


    scrollTo('#landing-cta-btn', '.predstavitev-pasme', 500);
    scrollTo('#home', '.landing-section', 500);
    scrollTo('#pasma', '.predstavitev-pasme', 500);
    scrollTo('#lastnik', '.predstavitev-lastnika', 500);
    scrollTo('#galerija', '.section-galerija', 500);
    scrollTo('#blog', '.section-blog', 500);
    scrollTo('#kontakt', '.kontakt', 500);



});
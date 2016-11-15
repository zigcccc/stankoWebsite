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

});
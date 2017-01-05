// function Travel(){this.init=function(){this.SelectricInit()},this.SelectricInit=function(){},this.init()}$(document).ready(function(){new Travel;$("select").selectric({nativeOnMobile:!1,arrowButtonMarkup:'<span class="left-bar-btn" ><img clas="header-serach-icon" src="images/icons/arr.svg"/></span>'})});
function Travel(){

    this.init = function(){
        this.SelectricInit();
    };

    this.SelectricInit = function(){
        var self = this;
    };
    this.init();
}
$(document).ready(function(){
    var Travel1 = new Travel();
    $('select').selectric({
        nativeOnMobile: false,
        arrowButtonMarkup: '' +
        '<span class="left-bar-btn" >' +
        '<img clas="header-serach-icon" src="'+path+'images/icons/arr.svg"/>' +
        '</span>'
    });
});

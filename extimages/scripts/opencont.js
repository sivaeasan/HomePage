var containerURL = '../extimages/container.html';

function SlideShow(slides,maxheight,maxwidth)
{
 this.slides=slides;
 this.maxwidth=maxwidth;
 this.maxheight=maxheight;
 this.currentindex=0;
 this.sliding=false;
}

function Slide(url, height, width, caption)
{
 this.url=url;
 this.height=height;
 this.width=width;
 this.caption=caption;
}

function openC(sl,initialIndex)
{
 var xWidth
 var xHeight
 var scrl='scrollbars=no';
 var ns4
 var opera

 max_height=sl.maxheight;
 max_width=sl.maxwidth;
 currentSlides=sl.slides;
 currentSlideIndex=initialIndex;

 if( navigator.appName == "Netscape" )  ns4=(parseInt(navigator.appVersion) == 4);
 if( navigator.userAgent.indexOf("Opera") != -1 ) opera=true;

 if (ns4)
 {
  xWidth=max_width + 170;
  xHeight=max_height + 150;
 }
 else
 {
  xWidth=max_width + 100;
  xHeight=max_height + 100;
 }

 if (xWidth > screen.availWidth)
 {
  xWidth=screen.availWidth - 50;
  scrl='scrollbars=yes';
 }

 if (xHeight > (screen.availHeight-19))
 {
  xHeight= screen.availHeight - 50;
  scrl='scrollbars=yes';
 }

 var xLeft=Math.round((screen.availWidth - xWidth) / 2);
 var xTop=Math.round((screen.availHeight - xHeight) / 2)-25;
 if (xTop < 0) { xTop=0; }

 var contWindow=window.open(containerURL, 'slideshow', scrl + ',titlebar=no,location=no,status=no,toolbar=no,width='+xWidth+',height='+xHeight+',top='+xTop+',left='+xLeft);

 contWindow.focus();
 if (opera) contWindow.document.location.reload(true);
}

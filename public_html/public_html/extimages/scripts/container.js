var slides = opener.currentSlides;
var ns4 = false;
var opera = false;
var iemac = false;
var safari = false;
var slideShowSpeed = 5000;
var crossFadeDuration = 3;

var sliding=false;

function getMaxHeight()
{
 if (screen.availHeight < (opener.max_height-200)) {return (screen.availHeight-200);}
 else {return opener.max_height;}
}

function getcaption() {return slides[currentSlideIndex()].caption;}
function currentSlideIndex(){return opener.currentSlideIndex;}
function currentHeight(){return slides[currentSlideIndex()].height;}
function currentWidth(){ return slides[currentSlideIndex()].width;}
function ImageSrc(){ return slides[currentSlideIndex()].url;}

function initPage()
{
 nua=navigator.userAgent;
 if(navigator.appName=="Netscape") ns4=(parseInt(navigator.appVersion)==4);
 if(ns4) writeCaption();
 opera=(nua.toLowerCase().indexOf('opera')!=-1);
 iemac=((nua.toLowerCase().indexOf('msie')!=-1) && (nua.toLowerCase().indexOf('mac')!=-1));
 safari=(nua.toLowerCase().indexOf('safari')!=-1);
}

function maxIndex()
{
 return slides.length-1;
}

var previousSelectedIndex = null;
var _captionLayer= null;
var _captionFrame = null;

function captionFrame()
{
 if(!_captionFrame) _captionFrame=document.captionFrameiLayer;
 return _captionFrame;
}

function captionLayer()
{
 if(! _captionLayer) _captionLayer=document.captionFrameiLayer.document.captionFrame;
 return _captionLayer;
}

function writeCaption()
{
 if(ns4)
 {
  captionLayer().document.write(slides[currentSlideIndex()].caption);
  captionLayer().document.close();
 }
 else
 {
  _captionLayer=document.getElementById('captionDiv');
  _captionLayer.innerHTML=slides[currentSlideIndex()].caption;
 }
}

function ImagePreloader(images,callback)
{
 this.callback=callback;
 this.nLoaded=0;
 this.nProcessed=0;
 this.aImages=new Array;
 this.nImages=images.length;
 for (var i=0;i<images.length;i++) this.preload(images[i]);
}

ImagePreloader.prototype.preload = function(image)
{
 var oImage=new Image;
 if(!iemac) this.aImages.push(oImage);
 oImage.onload=ImagePreloader.prototype.onload;
 oImage.onerror=ImagePreloader.prototype.onerror;
 oImage.onabort=ImagePreloader.prototype.onabort;
 oImage.oImagePreloader=this;
 oImage.bLoaded=false;
 oImage.src=image;
}

ImagePreloader.prototype.onComplete = function()
{
 this.nProcessed++;
 if (this.nProcessed==this.nImages) {this.callback(this.aImages,this.nLoaded);}
}

ImagePreloader.prototype.onload = function()
{
 this.bLoaded=true;
 this.oImagePreloader.nLoaded++;
 this.oImagePreloader.onComplete();
}

ImagePreloader.prototype.onerror = function()
{
 this.bError=true;
 this.oImagePreloader.onComplete();
}

ImagePreloader.prototype.onabort = function()
{
 this.bAbort=true;
 this.oImagePreloader.onComplete();
}

function onPreload(aImages,nImages)
{
 if (nImages==1)
 {
   document.images['mainview'].src=ImageSrc();
   document.images['mainview'].style.height=currentHeight()+'px';
   document.images['mainview'].style.width=currentWidth()+'px';
   writeCaption();
   if ((ns4) && (!sliding)) document.location.reload(true);
 }
}

function getNextImage(doingshow)
{
 if (!doingshow)
 {
  sliding=false;
  document.images['startstop'].src="scripts/show.gif";
 }
 previousSelectedIndex=opener.currentSlideIndex;
 if (++opener.currentSlideIndex > maxIndex()) opener.currentSlideIndex=0;

 if (safari)
 {
  document.images['mainview'].src=ImageSrc();
  document.images['mainview'].style.height=currentHeight()+'px';
  document.images['mainview'].style.width=currentWidth()+'px';
 }
 else
 {
  var aImg=[ImageSrc()];
  var ip=null;
  ip=new ImagePreloader(aImg,onPreload);
 }
}

function getPrevImage(doingshow)
{
 if (!doingshow)
 {
  sliding=false;
  document.images['startstop'].src="scripts/show.gif";
 }
 previousSelectedIndex=opener.currentSlideIndex;
 if (--opener.currentSlideIndex < 0) opener.currentSlideIndex=maxIndex();

 if (safari)
 {
  document.images['mainview'].src=ImageSrc();
  document.images['mainview'].style.height=currentHeight()+'px';
  document.images['mainview'].style.width=currentWidth()+'px';
 }
 else
 {
  var aImg=[ImageSrc()];
  var ip=null;
  ip=new ImagePreloader(aImg,onPreload);
 }
}

var t
var j=0
var p=slides.length

function runSlideShow(startshow)
{
 if (startshow)
 {
  if (sliding)
  {
   sliding=false;
   document.images['startstop'].src="scripts/show.gif";
  }
  else
  {
   sliding=true;
   document.images['startstop'].src="scripts/stop.gif";
  }
 }
 if (sliding)
 {
   if ((!opera) && (document.all)){
      document.images['mainview'].style.filter="blendTrans(duration=2)"
      document.images['mainview'].style.filter="blendTrans(duration=crossFadeDuration)"
      document.images['mainview'].filters.blendTrans.Apply()
   }
   getNextImage(true);

   if ((!opera) && (document.all)){ document.images['mainview'].filters.blendTrans.Play() }
   j=j+1
   if (j > (p-1)) j=0
   if (sliding) t=setTimeout('runSlideShow(false)',slideShowSpeed);
 }
}


var ns4 = false;
var opera = false;
var iemac = false;
var safari= false;
var slideShowSpeed = 5000;
var crossFadeDuration = 3;
var previousSelectedIndex = null;
var _captionLayer= null;
var _captionFrame = null;
var lastshow_id = -1;
var slideshow = null;
var xsliding = false;

nua=navigator.userAgent;
if(navigator.appName=="Netscape") ns4=(parseInt(navigator.appVersion)==4);
opera=(nua.toLowerCase().indexOf('opera')!=-1);
iemac=((nua.toLowerCase().indexOf('msie')!=-1) && (nua.toLowerCase().indexOf('mac')!=-1));
safari=(nua.toLowerCase().indexOf('safari')!=-1);

function openCI(sl,initialIndex,id)
{
 var curimg=document.images['mainview'+id];
 var sli=sl.slides[initialIndex];
 curimg.src=sli.url;
 curimg.style.height=sli.height+'px';
 curimg.style.width=sli.width+'px';
 sl.currentindex=initialIndex;
 writeCaption(sl,id,initialIndex);
}

function showCI(sl,initialIndex,id)
{
if(!xsliding){
 var curimg=document.images['mainview'+id];
 var sli=sl.slides[initialIndex];
 curimg.src=sli.url;
 curimg.style.height=sli.height+'px';
 curimg.style.width=sli.width+'px';
 writeCaption(sl,id,initialIndex);
}
}

function resetCI(sl,id)
{
 var curimg=document.images['mainview'+id];
 var sli=sl.slides[sl.currentindex];
 curimg.src=sli.url;
 curimg.style.height=sli.height+'px';
 curimg.style.width=sli.width+'px';
 writeCaption(sl,id,sl.currentindex);
}

function captionFrame()
{
 if(!_captionFrame) _captionFrame=document.captionFrameiLayer;
 return _captionFrame;
}

function captionLayer()
{
 if(!_captionLayer) _captionLayer=document.captionFrameiLayer.document.captionFrame;
 return _captionLayer;
}

function writeCaption(ss,id,index)
{
 if(ns4) {}
 else
 {
  _captionLayer=document.getElementById('captionDiv_'+id);
  if(_captionLayer != null)
  _captionLayer.innerHTML=ss.slides[index].caption;
 }
}

function ImagePreloader(images,id,ss,callback)
{
 this.callback=callback;
 this.nLoaded=0;
 this.nProcessed=0;
 this.aImages=new Array;
 this.nImages=images.length;
 this.id=id;
 this.ss=ss;
 for(var i=0;i<images.length;i++) this.preload(images[i]);
}

ImagePreloader.prototype.preload=function(ima)
{
 var oImage=new Image;
 if(!iemac) this.aImages.push(oImage);
 oImage.onload=ImagePreloader.prototype.onload;
 oImage.onerror=ImagePreloader.prototype.onerror;
 oImage.onabort=ImagePreloader.prototype.onabort;
 oImage.oImagePreloader=this;
 oImage.bLoaded=false;
 oImage.src=ima;
}

ImagePreloader.prototype.onComplete=function()
{
 this.nProcessed++;
 if(this.nProcessed==this.nImages) {this.callback(this.aImages,this.id,this.ss,this.nLoaded);}
}

ImagePreloader.prototype.onload=function()
{
 this.bLoaded=true;
 this.oImagePreloader.nLoaded++;
 this.oImagePreloader.onComplete();
}

ImagePreloader.prototype.onerror=function()
{
 this.bError=true;
 this.oImagePreloader.onComplete();
}

ImagePreloader.prototype.onabort=function()
{
 this.bAbort=true;
 this.oImagePreloader.onComplete();
}

function onPreload(aImages,id,ss,nImages)
{
 if(nImages==1)
 {
  document.images['mainview'+id].src=ss.slides[ss.currentindex].url;
  document.images['mainview'+id].style.height=ss.slides[ss.currentindex].height+'px';
  document.images['mainview'+id].style.width=ss.slides[ss.currentindex].width+'px';
  if((ns4) && (!ss.sliding)) document.location.reload(true);
 }
}

function Next(sl,id){getNextImage(sl,false,id);}

function getNextImage(ss,doingshow,id)
{
 if(!doingshow)
 {
  ss.sliding=false;
  if(document.images['startstop'+ id] != null) document.images['startstop'+ id].src="show.gif";
 }
 previousSelectedIndex=ss.currentindex;
 if(++ss.currentindex > (ss.slides.length-1)) ss.currentindex=0;
 writeCaption(ss,id,ss.currentindex);
 if(safari)
 {
  document.images['mainview'+id].src=ss.slides[ss.currentindex].url;
  document.images['mainview'+id].style.height=ss.slides[ss.currentindex].height+'px';
  document.images['mainview'+id].style.width=ss.slides[ss.currentindex].width+'px';
 }
 else
 {
  var aImg=[ss.slides[ss.currentindex].url];
  var ip=null;
  ip=new ImagePreloader(aImg,id,ss,onPreload);
 }
}

function Prev(sl,id){getPrevImage(sl,false,id);}

function getPrevImage(ss,doingshow,id)
{
 if(!doingshow)
 {
  ss.sliding=false;
  if(document.images['startstop'+ id] != null) document.images['startstop'+id].src="../extimages/scripts/show.gif";
 }
 previousSelectedIndex=ss.currentindex;
 if(--ss.currentindex < 0) ss.currentindex=ss.slides.length-1;
 writeCaption(ss,id,ss.currentindex);

 if(safari)
 {
  document.images['mainview'+id].src=ss.slides[ss.currentindex].url;
  document.images['mainview'+id].style.height=ss.slides[ss.currentindex].height+'px';
  document.images['mainview'+id].style.width=ss.slides[ss.currentindex].width+'px';
 }
 else
 {
  var aImg=[ss.slides[ss.currentindex].url];
  var ip=null;
  ip=new ImagePreloader(aImg,id,ss,onPreload);
 }
}

function RunShow(sl,id){runSlideShow(sl,true,id);}

function runSlideShow(sl,startshow,id)
{
 if(startshow)
 {
  if((lastshow_id !=id)&&(lastshow_id != -1)&&(xsliding))
  {
   if(document.images['startstop'+lastshow_id] != null) document.images['startstop'+lastshow_id].src="show.gif";
   slideshow=sl;
   lastshow_id=id;
   if(document.images['startstop'+id] != null) document.images['startstop'+id].src="../extimages/scripts/stop.gif";
   return;
  }
  if(xsliding)
  {
   xsliding=false;
   slideshow.sliding=false;
   if(document.images['startstop'+id] != null) document.images['startstop'+id].src="show.gif";
   return;
  }
  else
  {
   slideshow=sl;
   xsliding=true;
   slideshow.sliding=true;
   lastshow_id=id;

   if(document.images['startstop'+id] != null) document.images['startstop'+id].src="../extimages/scripts/stop.gif";
  }
 }
 if(xsliding)
 {
  if((!opera)&&(document.all))
  {
   document.images['mainview'+id].style.filter="blendTrans(duration=2)"
   document.images['mainview'+id].style.filter="blendTrans(duration=crossFadeDuration)"
   document.images['mainview'+id].filters.blendTrans.Apply()
  }
  getNextImage(slideshow,true,id);
  if((!opera)&&(document.all)) document.images['mainview'+id].filters.blendTrans.Play();
  t=setTimeout('runSlideShow(slideshow,false,lastshow_id)',slideShowSpeed);
 }
}

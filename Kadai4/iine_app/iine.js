$(function() {
  'use strict';

  var thanks = false; // お礼メッセージを出す場合はtrue、出さない場合はfalse
  var folderpath = '/';

  var count = document.getElementById('countnum');
  var iine = document.getElementById('iine');
  var iineWrap = document.getElementById('iine_wrap');
  var iineThanks = document.getElementById('iine_thanks');
  var countNum = count.textContent;
  var pathname = location.href;

  var ajaxPath = `${location.protocol}//${location.host}${folderpath}iine_app/_ajax.php`;

  var fadeout = function() {
    setTimeout(function(){
      iineThanks.classList.add('fadeout');
    }, 6000);
    setTimeout(function(){
      iineThanks.style.display = "none";
      iineThanks.classList.remove('fadeout');
    }, 7000);
   }

  $(document).ready( function(){
    if(localStorage.getItem(pathname) == 'checked') {
      iineWrap.className = 'alreadychecked';
    }

    $.ajax({
      type: 'GET',
      url : ajaxPath,
      data:{ path: pathname, mode: 'show' }
    }).fail(function(){
      alert('iine.jsのfolderpathの値を確認して下さい。');
    }).done(function(res){
      count.innerHTML = res;
    });
  });


  // update
  $(document).on('click', '#iine', function(e) {
	e.preventDefault();
  if(localStorage.getItem(pathname) == 'checked') {
  iineWrap.className = '';
  localStorage.removeItem(pathname);
    // ajax処理
    $.post(ajaxPath, {
      path: pathname,
      mode: 'uncheck'
    }).fail(function(){
      alert('iine.jsのfolderpathの値を確認して下さい。');
    }).done(function(res){
      count.innerHTML = res;
    });
  } else {
    iineWrap.className = 'checked';
    if(thanks === true) {
      iineThanks.style.display = "block";
      fadeout();
    }
    localStorage.setItem(pathname, 'checked');
    // ajax処理
    $.post(ajaxPath, {
      path: pathname,
      mode: 'check'
    }).fail(function(){
      alert('iine.jsのfolderpathの値を確認して下さい。');
    }).done(function(res){
      count.innerHTML = res;
    });
  }
});
});

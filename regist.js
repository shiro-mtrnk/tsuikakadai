
//ひらがなと漢字指定(対象:名前(姓)、名前(名))
document.addEventListener('DOMContentLoaded', function() {
    var targets1 = document.getElementsByClassName('hirakan');
    for(var i=0;i<targets1.length;i++){
        targets1[i].oninput = function(){
            var alertelement = this.parentNode.getElementsByClassName('alertarea');
            if((this.value !='')&&(this.value.match(/[^ぁ-んー-龠ー]/))){
                if(alertelement[0]){
                    alertelement[0].innerHTML = 'ひらがなor漢字で入力してください。';
                }
                this.style.boder = "2px solid red";
            }else{
                if(alertelement[0]){
                    alertelement[0].innerHTML = '';
                }
                this.style.boder = "apx solid black";
            }
        }
    }
});


//カタカナ指定(対象:カナ(姓)、カナ(名))
document.addEventListener('DOMContentLoaded', function() {
    var targets1 = document.getElementsByClassName('katakana');
    for(var i=0;i<targets1.length;i++){
        targets1[i].oninput = function(){
            var alertelement = this.parentNode.getElementsByClassName('alertarea');
            if((this.value !='')&&(this.value.match(/[^ァ-ヶー]/))){
                if(alertelement[0]){
                    alertelement[0].innerHTML = 'カタカナで入力してください。';
                }
                this.style.boder = "2px solid red";
            }else{
                if(alertelement[0]){
                    alertelement[0].innerHTML = '';
                }
                this.style.boder = "apx solid black";
            }
        }
    }
});

//半角英数、半角記号(ハイフン＋@)指定(対象:メールアドレス)
document.addEventListener('DOMContentLoaded', function() {
    var targets1 = document.getElementsByClassName('alpha');
    for(var i=0;i<targets1.length;i++){
        targets1[i].oninput = function(){
            var alertelement = this.parentNode.getElementsByClassName('alertarea');
            if((this.value !='')&&(this.value.match(/[^a-zA-Z\d\-@.]/))){
                if(alertelement[0]){
                    alertelement[0].innerHTML = '半角英数、-、@のみで入力してください。';
                }
                this.style.boder = "2px solid red";
            }else{
                if(alertelement[0]){
                    alertelement[0].innerHTML = '';
                }
                this.style.boder = "apx solid black";
            }
        }
    }
});


//半角英数指定(対象:登録パスワード)
document.addEventListener('DOMContentLoaded', function() {
    var targets1 = document.getElementsByClassName('eisuu');
    for(var i=0;i<targets1.length;i++){
        targets1[i].oninput = function(){
            var alertelement = this.parentNode.getElementsByClassName('alertarea');
            if((this.value !='')&&(this.value.match(/[^a-zA-Z\d]/))){
                if(alertelement[0]){
                    alertelement[0].innerHTML = '半角英数字で入力してください。';
                }
                this.style.boder = "2px solid red";
            }else{
                if(alertelement[0]){
                    alertelement[0].innerHTML = '';
                }
                this.style.boder = "apx solid black";
            }
        }
    }
});


//半角数字指定(対象:郵便番号)
document.addEventListener('DOMContentLoaded', function() {
    var targets1 = document.getElementsByClassName('suuji');
    for(var i=0;i<targets1.length;i++){
        targets1[i].oninput = function(){
            var alertelement = this.parentNode.getElementsByClassName('alertarea');
            if((this.value !='')&&(this.value.match(/[^\d]/))){
                if(alertelement[0]){
                    alertelement[0].innerHTML = '半角数字で入力してください。';
                }
                this.style.boder = "2px solid red";
            }else{
                if(alertelement[0]){
                    alertelement[0].innerHTML = '';
                }
                this.style.boder = "apx solid black";
            }
        }
    }
});


//ひらがな、カタカナ、漢字、数字、ハイフン、スペース指定(対象:住所)
document.addEventListener('DOMContentLoaded', function() {
    var targets1 = document.getElementsByClassName('japanese');
    for(var i=0;i<targets1.length;i++){
        targets1[i].oninput = function(){
            var alertelement = this.parentNode.getElementsByClassName('alertarea');
            if((this.value !='')&&(this.value.match(/[^ぁ-んァ-ヶー-龠ー\d-\s]/))){
                if(alertelement[0]){
                    alertelement[0].innerHTML = 'ひらがな、カタカナ、漢字、数字、ハイフン、スペースのみ入力してください。';
                }
                this.style.boder = "2px solid red";
            }else{
                if(alertelement[0]){
                    alertelement[0].innerHTML = '';
                }
                this.style.boder = "apx solid black";
            }
        }
    }
});



//エラーチェックを出力
document.addEventListener('DOMContentLoaded', function() {
    var targets =document.getElementsByClassName('nyuuryoku');
    for(var a=0;a<targets.length;a++){
        targets[a].onsubmit = function(){
            var inputelements = this.querySelectorAll('input');
            var alerts = this.getElementsByClassName('alertarea');
            var ret = 0;
            for(var j=0;j<alerts.lemgth;j++){
                if(inputelements[j].oninput){
                    inputelements[j].oninput();
                }
            }
            for(var j=0;j<alerts.length;j++){
                if(alerts[j].innerHTML.length>0){
                    ret++;
                }
            }
            if(ret == 0){
                return true;
            }else{
                alert(ret+"カ所の入力誤りがあります。");
                return false;
            }
        }
    }
});
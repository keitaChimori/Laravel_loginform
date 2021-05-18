// 画面の準備が終わったら
$(function(){
  // 検索ボタンが押されたら
  $('#search-btn').on('click',function(){
    // 入力された番号の取得
    let zipCode = $('#post').val();

    // ajaxで郵便番号APIへリクエストを送る
    $.ajax({
      // 通信
      url:'https://zipcloud.ibsnet.co.jp/api/search',
      type:'GET',
      dataType: 'jsonp',
      data:{
        zipcode: zipCode,
      }
    }).done((data)=>{
      // 通信が成功した時
      // dataには通信の結果が格納される
      // console.log(data);
      let prefecture = data.results[0].address1
      let city = data.results[0].address2
      let city2 = data.results[0].address3
      let address = prefecture+city+city2;
      // $('#address').text(prefecture);
      document.getElementById('address1').value = address;
  
    }).fail((error) => {
      // 通信が失敗した時
      // errorには失敗の原因が格納される

    })
  })
})
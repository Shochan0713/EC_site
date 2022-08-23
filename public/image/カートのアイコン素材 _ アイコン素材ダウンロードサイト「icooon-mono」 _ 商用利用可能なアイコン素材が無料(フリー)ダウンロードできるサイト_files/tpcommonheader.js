//tpcommonheader
var tpLinkName = ["シルエット素材", "飾り枠", "人ピクトグラム素材", "フキダシ素材", "矢印", "花・植物イラスト", "ネットショップ素材", "ループ・BGM素材", "飾り線素材", "フラットアイコン", "クリスマスetc", "パターン背景", "アイコン", "街イラスト", "リボン素材", "鳥獣戯画", "レース", "マンガ文字", "筆文字", "スタンプ", "galley", "集中線", "時短素材", "顔アイコン", "twitter"];
var tpLinkURL = ["kage-design.com", "frames-design.com", "pictogram2.com", "fukidesign.com", "yajidesign.com", "flode-design.com", "design-ec.com", "dust-sounds.com", "free-line-design.com", "flat-icon-design.com", "event-pre.com", "bg-patterns.com", "icooon-mono.com", "town-illust.com", "ribbon-freaks.com", "chojugiga.com", "da-lace.com", "dddfont.com", "https://calligra.design/", "https://stampo.fun/", "https://homejaws.com/", "https://mangasozai.com/", "https://jitanda.com/", "https://icon-z.com", "twitter.com/topeconheroes"];
jQuery(function ($) {
    var tplinkTxt = '<li>Topeconheroes</li>';
    for (var i = 0; i < tpLinkName.length; i++) {
        if (tpLinkURL[i] != "none") {
            if (tpLinkURL[i].indexOf('https', 0) == '-1') {
                tplinkTxt = tplinkTxt + ('<li><a href="http://' + tpLinkURL[i] + '">' + tpLinkName[i] + '</a></li>');

            } else {
                tplinkTxt = tplinkTxt + ('<li><a href="' + tpLinkURL[i] + '">' + tpLinkName[i] + '</a></li>');
            }
        }
    }
    $("div#tplinkheader ul").html(tplinkTxt);

    $("div#tplinkheader ul li").hover(
        function () {
            var indexNum = $("div#tplinkheader ul li").index(this);
            var indexNumM1 = indexNum - 1;
            var offset = $(this).offset();

            var offset2 = offset.left - 30;
            if (indexNum != 0) {
                $("#bPointer").show().css('left', offset2).html(tpLinkName[indexNumM1]);
            }
        },
        function () {
            $("#bPointer").hide();
        }
    );
    $("#tplinkheader").prependTo("body");
});

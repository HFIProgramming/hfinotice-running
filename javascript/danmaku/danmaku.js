$(document).ready(function() {
    var color_list = {
        white: "#ffffff",
        orange: "#ff9800",
        aqua: "#59c3e2",
        blue: "#2196f3",
        red: "#f44336",
        yellow: "#ffeb3b",
        green: "4caf50",
        purple: "#9c27b0",
        pink: "#e91e63"
    };
    $("span.color-block").click(function() {
        var color = color_list[this.id];
        $("input#color-picker").val(color).css("background-color", color);
    });
    $("span.color-block#white").trigger("click");

    var warning = "请文明用语，谢谢！";
    $("#postform").submit(function(e) {
        var text = ($("#text").val()).toLowerCase();
        $.post("http://2.hfinotice.sinaapp.com/danmaku/ajaxIsBlocked", {"text": text}, function(data) {
            if(data == "true"){
                $("#text").val("");
                e.preventDefault();
                alert(warning);
            }
            else if(text == ""){
                e.preventDefault();
            }
            else if(text.length >= 50){
                $("#text").val("");
                e.preventDefault();
                alert("输入的字符过长！");
            }
            else{
                $("#token").val(decode_token($("#token").val()));
            }
        });
    });
});

function decode_token(str) {
    var base64DecodeChars = [-1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
        -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
        -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 62, -1, -1, -1, 63,
        52, 53, 54, 55, 56, 57, 58, 59, 60, 61, -1, -1, -1, -1, -1, -1,
        -1,　0,　1,　2,　3,  4,　5,　6,　7,　8,　9, 10, 11, 12, 13, 14,
        15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, -1, -1, -1, -1, -1,
        -1, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40,
        41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, -1, -1, -1, -1, -1];
    var c1, c2, c3, c4;
    var i, len, out;
    len = str.length;
    i = 0;
    out = "";
    while(i < len) {
        /* c1 */
        do {
            c1 = base64DecodeChars[str.charCodeAt(i++) & 0xff];
        } while(i < len && c1 == -1);
        if(c1 == -1)
            break;
        /* c2 */
        do {
            c2 = base64DecodeChars[str.charCodeAt(i++) & 0xff];
        } while(i < len && c2 == -1);
        if(c2 == -1)
            break;
        out += String.fromCharCode((c1 << 2) | ((c2 & 0x30) >> 4));
        /* c3 */
        do {
            c3 = str.charCodeAt(i++) & 0xff;
            if(c3 == 61)
                return out;
            c3 = base64DecodeChars[c3];
        } while(i < len && c3 == -1);
        if(c3 == -1)
            break;
        out += String.fromCharCode(((c2 & 0XF) << 4) | ((c3 & 0x3C) >> 2));
        /* c4 */
        do {
            c4 = str.charCodeAt(i++) & 0xff;
            if(c4 == 61)
                return out;
            c4 = base64DecodeChars[c4];
        } while(i < len && c4 == -1);
        if(c4 == -1)
            break;
        out += String.fromCharCode(((c3 & 0x03) << 6) | c4);
    }
    return out;
}
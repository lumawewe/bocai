<!DOCTYPE html>

<html lang="zh">
<head>
	<meta charset="UTF-8">
	<title>{:GetVar('webtitle')}</title>
	<meta name="keywords" content="{:GetVar('keywords')}" />
	<meta name="description" content="{:GetVar('description')}" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" >

	<link rel="stylesheet" href="__CSS2__/bootstrap.min.css">
	<link rel="stylesheet" href="__CSS2__/reset.css">
	<link rel="stylesheet" href="__CSS2__/icon.css">
	<link rel="stylesheet" href="__CSS2__/main.css">
	<link rel="stylesheet" href="__CSS2__/login.css">

	<link rel="stylesheet" type="text/css" href="__CSS__/common.css" />
	<link rel="stylesheet" type="text/css" href="__CSS__/layout.css" />
	<link rel="stylesheet" type="text/css" href="__CSS__/style.css" />
	<link rel="stylesheet" type="text/css" href="__CSS__/artDialog.css" />
	<script type="text/javascript" src="__JS__/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="__JS__/artDialog.js"></script>
	<script type="text/javascript" src="__JS__/index.js"></script> 
	    <script type="text/javascript" src="/resources/main/common.js"></script>
	<style>
		.y_lclass{
			top:3px;
			right: 3px;
		}
	</style>
</head>
<body>

<div class="login_main">
	<div class="login_bg">
		<div class="login_title">
			<h2 class="margin_0">用户登录</h2>
		</div>
		<div class="login_input">
			<form method="post" class="ruivalidate_form_class" onsubmit="return check_login(this)" id="ruivalidate_form_class" checkby_ruivalidate url="" action="{:U('Public/logindo')}">
				<div class="login_user user_commom_style">
					<span>账 号：</span>
					<input  type="text"  class="text_accont" name="name"  verify="isLoginName" isNot="true" msg="账号不能为空"  style="border-radius:4px;"/>
					<em class="checkInput">
						<i class="iconfont"></i>
						<span></span>
					</em>
				</div>
				<div class="login_pass user_commom_style">
					<span>密 码：</span>
					<input  type="password" class="text_accont" name="pass" verify="isALL" isNot="true" msg="请填写6-16位，字母与数字组合的密码" style="border-radius:4px;" />
					<em class="checkInput">
						<i class="iconfont"></i>
						<span></span>
					</em>
				</div>
				<div class="login_pass user_commom_style">
					<span>验证码：</span>
					<input  type="text"  class="text_accont" name="code" maxlength="10" style="width:120px;"  isNot="true"  verify="isAll" msg="请输入验证码" style="border-radius:4px;" />
					<a href="javascript:void(0)" class="two_code">
						<img  src="{:U('Public/verify',array('imageW'=>130,'imageH'=>40,'fontSize'=>18))}"  onclick="this.src=this.src+'?temp='+ 1" /></a>
					//<em>
						//<i class="iconfont">&#xe601;</i>
						//验证码不能为空
					//</em>
				</div>
				<div class="btn_submit">
					<input  type="submit" value="点击登录" class="btn-danger active sub_btn btn-sm" style="width:8em;height:2em;font-size: 1.3em;"/>
					<a href="{:U('Public/forgetPaw')}">忘记密码?</a>
				</div>
			</form>
		</div>

    </div>
	</div>



<div class="loginCengBox">
	<div class="loginCeng">
		<div class="loginCengH">
			<h3>温馨提示</h3>
			<span class="loginCengClose">
				<i class="iconfont icon-guanbi-copy"></i>
			</span>
		</div>
		<div class="loginCengB">
		
		</div>
		<div class="loginCengF">
			<button type="submit" >确定</button>
		</div>
	</div>
</div>
<script type="text/javascript" src="__JS__/jquery.form.min.js"></script><!-- Jquery form表单提交 -->
<script type="text/javascript" src="__JS__/jquery.ruiValidate.js"></script><!-- 表单验证的js文件 -->
<script type="text/javascript" src="__JS__/jquery.kinMaxShow-1.1.min.js"></script>
<script type="text/javascript">
	$(function(){
		$("#kinMaxShow").kinMaxShow({
			height:225,
			intervalTime:2,
			button:{
				showIndex:false,
				normal:{marginRight:'8px',border:'0',right:'50%',bottom:'10px',borderRadius:'7px',background:'#fff'},
				focus:{background:'#bd0d0d',border:'0'}
			}
		});

	});
</script>
<!-- 调用插件 -->
<script type="text/javascript">
	$(function(){
		// var _FormValidate = new $.rui_validate();
		// _FormValidate.initload();

		// _FormValidate.initForm({
		// 	FocusTip:true,	//获取焦点则进行提示，显示输入规则（ boolen ）
		// 	BlurChange:true,	//失去焦点再进行提示，显示输入规则（ boolen ）
		// 	ShowTip: "Icon",	//显示提示信息的类型：Bubble（气泡）；IconText( 图标加文字 ) ; Text（仅是文字）; Icon（正确或错误的图标）； Highlights 聚焦高亮 ;
		// 	ShowTipDirection:"right", //提示信息的位置：right：右边，top：上面；bottom：下面；inside：输入框内；
		// 	FormObj:$("#ruivalidate_form_class"),	//验证的表单容器
		// 	FormIdName: 'ruivalidate_form_class',  //form的ID名称
		// 	ShowTipClass:"ts_msg",    //显示提示信息的区域class
		// 	ShowTipStyle:"",    //显示提示信息的class
		// 	SubBtn:'sub_btn',   //提交按钮的class
		// 	CallBack: ruivalidate_form_class //回调函数
		// })
		// function ruivalidate_form_class(obj) {
		// 	var _this = $(".ruivalidate_form_class .sub_btn");
		// 	_sub(_this);
		// }
	
		$('.text_accont[name="name"]').blur(function () {
			var text = $(this).val();
			if(!text || text.trim() == ''){
				$(this).siblings('.checkInput').show();
				$(this).siblings('.checkInput').find('span').text('账号不能为空');
				$(this).siblings('.checkInput').find('.iconfont').removeClass('icon-chenggong');
				$(this).siblings('.checkInput').find('.iconfont').addClass('icon-cross-ivt');
			}else{
				$(this).siblings('.checkInput').show();
				$(this).siblings('.checkInput').find('span').text('');
				$(this).siblings('.checkInput').find('.iconfont').removeClass('icon-cross-ivt');
				$(this).siblings('.checkInput').find('.iconfont').addClass('icon-chenggong');
			}
		})

		$('.text_accont[name="pass"]').blur(function () {
			var text = $(this).val();
			if(!text || text.trim() == ''){
				$(this).siblings('.checkInput').show();
				$(this).siblings('.checkInput').find('span').text('请填写6-16位，字母与数字组合的密码');
				$(this).siblings('.checkInput').find('.iconfont').removeClass('icon-chenggong');
				$(this).siblings('.checkInput').find('.iconfont').addClass('icon-cross-ivt');
			}else if(text.length < 6 || text.length > 16){
				$(this).siblings('.checkInput').show();
				$(this).siblings('.checkInput').find('span').text('密码范围在6-16位');
				$(this).siblings('.checkInput').find('.iconfont').removeClass('icon-chenggong');
				$(this).siblings('.checkInput').find('.iconfont').addClass('icon-cross-ivt');
			}else{
				$(this).siblings('.checkInput').show();
				$(this).siblings('.checkInput').find('span').text('');
				$(this).siblings('.checkInput').find('.iconfont').removeClass('icon-cross-ivt');
				$(this).siblings('.checkInput').find('.iconfont').addClass('icon-chenggong');
			}
		})

	});

	function check_login(obj){

		$.post($(obj).attr('action'),$(obj).serialize(), function(json){
			if(json.sign==1){
				loginCengBoxFn(json.message);
				window.location.href = "{:U('Index.index')}";
			}else{
				if(json.message=="你的帐号已在别处登陆，是否重新登陆"){
					if(confirm('你的帐号已在别处登陆，是否重新登陆')){
						$.ajax({
							url : $(obj).attr('action'),
							type : "POST",
							data : {
								name : $("input[name=name]").val(),
								pass :$("input[name=pass]").val(),
								nocode : true,
							},
							success : function (json) {
								loginCengBoxFn(json.message);
								window.location.href = "{:U('Index.index')}";
							}
						})
					}
				}else{
					// alt(json.message);
					loginCengBoxFn(json.message);
				}
			}
		},'json');
		return false;
	}
</script>
</body>
</html>
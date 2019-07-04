<include file="Public/headermember" />
	<link rel="stylesheet" href="__CSS2__/bootstrap.min.css">
	<link rel="stylesheet" href="__CSS2__/reset.css">
	<link rel="stylesheet" href="__CSS2__/updatePass.css">
	<link rel="stylesheet" href="__CSS2__/userInfo.css">
<script src="__JS2__/require.js" data-main="__JS2__/homePage"></script>
<div class="vip_info clearfix container">
			<include file="Member/side" />
	<div class="update_pass" style="margin-left:160px; margin-top:1px;">
	<div class="container-fluid" style="background: #e8e8e8;">
		<ul class="queue">
			<li class="now">
				<span>验证原密码</span>
				<i class="iconfont"></i>
			</li>
			<li class="">
				<span>设置新密码</span>
				<i class="iconfont"></i>
			</li>
			<li>
				<span>完成</span>
				<i class="iconfont"></i>
			</li>
		</ul>
		<form action="{:U('Member/update_pass')}" class="update_form" method="post">
			<p>
				<span>原密码：</span>
				<input type="password" name="password">
				<input type="hidden" name="settype" value="1">
			</p>
			<button type="submit" class="btn common_btn" >提交</button>
		</form>	
	</div>
	</div>
	</div>
	<script>
    $(function(){
        $('#reg_btn').click(function () {
            $.ajax({
                url : "{:U('member/update_pass')}",
                type : 'POST',
                data : {
                    password:$('#password').val(),
                    settype:$('#settype').val(),
                },
                beforeSend : function(){
                    $('#submit').attr('disabled','disabled');
                },
                success : function(json){
                    if(json.code==1){
                        window.location.href= "{:U('Member/update_pass2')}";
                    }else{
                        alt(json.msg,-1);
                    }
                }
            })

        })
    })
</script>
<include file="Public/footer" />
</body>
</html>
<style>
    .profile-main{
        text-align: center;
    }
    .profile-name{
        font-size: x-large;
    }
    .profile-icon label img{
        cursor: pointer;
    }
    input[type=file]{
        display: none;
    }
</style>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#icon').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function(){
        $("#avatar").change(function() {
            readURL(this)
        })
    })


</script>
<div class="profile-main">
    <div class="profile-heads">
        <div class="profile-icon">
            <input type="file" id="avatar" name="avatar">
            <label for="avatar">
                <img id="icon" src="<?=Yii::getAlias("@web")?>/images/user.png" width="200">
            </label>

        </div>
        <div class="profile-name">
            <?=Yii::$app->user->identity->username?>
        </div>
        <div class="profile-label">
            @admin
        </div>
    </div>
</div>

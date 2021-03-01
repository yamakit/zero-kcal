
<?php
            $sql = "SELECT * FROM `food_names`";
            $age_data = $pdo->query($sql);
            while( $data = $age_data->FETCH_ASSOC()){ ?>
                <option value="<?=$data['id']?>"><?=$data['food_name']?></option>
            <?php } ?>

<script>
     $.ajax({
        type: "GET",
        url: "pref.json",
        dataType: "json",
        cache: false,
        success: function(PrefData) {
            // select の内容削除
            $("#SelectPref").empty();
            var append = '<option value=""></option>&#10;';
            // JSON データを option に展開生成
            for(var i = 0; i < PrefData.length; i++) {
                append += '<option value="' + PrefData[i].id + '" >';
                append += PrefData[i].name;
                append += '</option>';
                append += '&#10;';
            }
            $("#SelectPref").append(append);
        }
    });
    return false;
}
</script>
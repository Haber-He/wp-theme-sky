<?php 
    // 分类添加字段
    function ems_add_category_field(){
        echo '<div class="form-field">
                <label for="cat_template">内容显示方式</label>
                <select name="cat_template" id="cat_template">
                    <option value="list">--列表--</option>
                    <option value="image">--图片--</option>
                </select>
                <p>内容显示方式.</p>
              </div>';
    }
    
    add_action('category_add_form_fields','ems_add_category_field',10,2);

    // 分类编辑字段
    //echo get_option('cat_template-'.$tag->term_id)
    function ems_edit_category_field($tag){
        
        $value = get_option('cat_template-'.$tag->term_id);
        
        echo '<tr class="form-field">
                <th scope="row"><label for="cat_template">内容显示方式</label></th>
                <td>
                    <select name="cat_template" id="cat_template">
                        <option value="list">--列表--</option>
                        <option value="image">--图片--</option>
                    </select>
                    <br>
                    <span class="cat_template">内容显示方式.</span>
                </td>
            </tr>';           
            
    }
    add_action('category_edit_form_fields','ems_edit_category_field',10,2);

    // 保存数据
    function ems_taxonomy_metadate($term_id){
        if(isset($_POST['cat_template'])){
            //判断权限--可改
            if(!current_user_can('manage_categories')){
                return $term_id;
            }
            // 模板
            $template_key = 'cat_template-'.$term_id; // key 选项名为 cat-tel-1 类型
            $template_value = $_POST['cat_template'];// value
                
            // 更新选项值
            update_option( $template_key, $template_value ); 
        }
    }

    // 虽然要两个钩子，但是我们可以两个钩子使用同一个函数
    add_action('created_category','ems_taxonomy_metadate',10,1);
    add_action('edited_category','ems_taxonomy_metadate',10,1);
?>
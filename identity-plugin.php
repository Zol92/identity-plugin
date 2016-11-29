<?php
/**
*Plugin Name: Identity
*Plugin URI:  http://localhost/monwp/
*Description: Plugin permettant à un utilisateur du site de s'identifier par ses nom et prénom ainsi que son âge.
*Version:     1.0
*Author:      Aurélien Bonnaud-Le Roux
*Author URI:  http://localhost/monwp/
*/

add_action('widgets_init','exemple_init');

function exemple_init() {
  register_widget("exemple_widget");
}

class exemple_widget extends WP_widget {
  function exemple_widget() {
    $options = array("classname" => "exemple-widget", "description" => "test de texte");
    $this->WP_widget("widget-exemple","Widget d'exemple",$options);
  }
  function widget($args, $d) {
    extract($args);
    echo $before_widget;
    echo $before_title."Identity".$after_title;
    ?>
    <p>Bonjour je me nomme <strong><?php echo $d["nom"]; ?></strong> et j'ai <?php echo $d["age"]; ?> ans</p>
    <?php
    echo $after_widget;
  }

  function update($new,$old){
    return $new;
  }

  function form($d) {
    $defaut = array("titre" => "Identity", "age" => "20");
    $d = wp_parse_args($args,$defaut)
    ?>
    <p>
      <label for="<?php echo $this->get_field_id("titre");?>">Titre :</label>
      <input name="<?php echo $this->get_field_name("titre");?>"id="<?php echo $this->get_field_id("titre");?>"type="text" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id("nom");?>">Nom et prénom :</label>
      <input name="<?php echo $this->get_field_name("nom");?>"id="<?php echo $this->get_field_id("nom");?>"type="text" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id("age");?>">Age :</label>
      <input name="<?php echo $this->get_field_name("age");?>"id="<?php echo $this->get_field_id("age");?>"type="text" maxlength="3" />
    </p>
    <?php
  }
}

?>

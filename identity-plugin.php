<?php
/**
*Plugin Name: Identity
*Plugin URI:  http://localhost/monwp/
*Description: Plugin permettant à un utilisateur du site de s'identifier par ses nom et prénom ainsi que son âge et de donner un avis sur le site wordpress visité.
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
    $this->WP_widget("widget-exemple","Identity",$options);
  }
  function widget($args, $d) {
    extract($args);
    echo $before_widget;
    echo $before_title."Identity".$after_title;
    ?>
    <p>Bonjour je me nomme <strong><?php echo $d["nom"]; ?></strong> et j'ai <?php echo $d["age"]; ?> ans</p>
    <p><strong>Mon avis sur le site est :</strong> <?php echo $d["comment"]; ?></p>
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
      <label for="<?php echo $this->get_field_id("nom");?>">Nom et prénom :</label>
      <input name="<?php echo $this->get_field_name("nom");?>"id="<?php echo $this->get_field_id("nom");?>"type="text" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id("age");?>">Age :</label>
      <input name="<?php echo $this->get_field_name("age");?>"id="<?php echo $this->get_field_id("age");?>"type="text" maxlength="3" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id("comment");?>">Commentaire :</label>
      <input name="<?php echo $this->get_field_name("comment");?>"id="<?php echo $this->get_field_id("comment");?>"type="text" />
    </p>
    <?php
  }
}

?>

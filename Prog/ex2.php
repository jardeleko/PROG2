<!DOCTYPE html>
<html>
  <body>

    <table border="1">
      <tr>
        <th>Nome </th>
        <th>NP1</th>
        <th>NP2</th>
      </tr>
      <?php
        $vector = array(
          1=>array("nome"=>"Pedro","np1"=>8, "np2"=>5),
          2=>array("nome"=>"Joana","np1"=>10, "np2"=>4),
          3=>array("nome"=>"Patricia","np1"=>5, "np2"=>3),
          4=>array("nome"=>"Luciane","np1"=>6, "np2"=>6),
          5=>array("nome"=>"Manoel","np1"=>7, "np2"=>8),
          6=>array("nome"=>"Karen","np1"=>5, "np2"=>10),
          7=>array("nome"=>"João","np1"=>9, "np2"=>7),
          8=>array("nome"=>"Veridiana","np1"=>7, "np2"=>4),
          9=>array("nome"=>"Gabriel","np1"=>2, "np2"=>7),
          10=>array("nome"=>"Luí","np1"=>7, "np2"=>5)
      );

      foreach ($vector as $item) {
        echo "<tr>";
        echo "<td>".$item["nome"]."</td>"."<td>".$item["np1"]."</td>"."<td>".$item["np2"]."</td>";
      }

       ?>
    </table>
  </body>
</html>

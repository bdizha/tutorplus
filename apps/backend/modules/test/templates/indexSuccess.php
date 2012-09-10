<h1>Countrys List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Code</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($countrys as $country): ?>
    <tr>
      <td><a href="<?php echo url_for('test/edit?id='.$country->getId()) ?>"><?php echo $country->getId() ?></a></td>
      <td><?php echo $country->getName() ?></td>
      <td><?php echo $country->getCode() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('test/new') ?>">New</a>

<h1>Documents List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Size</th>
      <th>Type</th>
      <th>Parent</th>
      <th>Is directory</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($documents as $document): ?>
    <tr>
      <td><a href="<?php echo url_for('document/edit?id='.$document->getId()) ?>"><?php echo $document->getId() ?></a></td>
      <td><?php echo $document->getName() ?></td>
      <td><?php echo $document->getSize() ?></td>
      <td><?php echo $document->getType() ?></td>
      <td><?php echo $document->getParentId() ?></td>
      <td><?php echo $document->getIsDirectory() ?></td>
      <td><?php echo $document->getCreatedAt() ?></td>
      <td><?php echo $document->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('document/new') ?>">New</a>

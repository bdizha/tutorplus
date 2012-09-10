<h1>Contacts List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>First name</th>
      <th>Last name</th>
      <th>Nick name</th>
      <th>Email address</th>
      <th>Phone work</th>
      <th>Phone home</th>
      <th>Phone mobile</th>
      <th>Postcode</th>
      <th>Address line one</th>
      <th>Address line two</th>
      <th>City</th>
      <th>State province</th>
      <th>Country</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($contacts as $contact): ?>
    <tr>
      <td><a href="<?php echo url_for('contact/edit?id='.$contact->getId()) ?>"><?php echo $contact->getId() ?></a></td>
      <td><?php echo $contact->getFirstName() ?></td>
      <td><?php echo $contact->getLastName() ?></td>
      <td><?php echo $contact->getNickName() ?></td>
      <td><?php echo $contact->getEmailAddress() ?></td>
      <td><?php echo $contact->getPhoneWork() ?></td>
      <td><?php echo $contact->getPhoneHome() ?></td>
      <td><?php echo $contact->getPhoneMobile() ?></td>
      <td><?php echo $contact->getPostcode() ?></td>
      <td><?php echo $contact->getAddressLineOne() ?></td>
      <td><?php echo $contact->getAddressLineTwo() ?></td>
      <td><?php echo $contact->getCity() ?></td>
      <td><?php echo $contact->getStateProvinceId() ?></td>
      <td><?php echo $contact->getCountryId() ?></td>
      <td><?php echo $contact->getCreatedAt() ?></td>
      <td><?php echo $contact->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('contact/new') ?>">New</a>

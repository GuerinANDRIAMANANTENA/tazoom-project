
 <div class="card-tazoomcm my-3">
<table id="" class="my-2 table-striped border-white table" width="100%">
    <thead>
        <tr class="text-dark">
            <th width="8%">...</th>
           <th>Code</th>
                                <th>Raison social</th>
                                <th>Adresse</th>
                                <th>E-mail</th>
                                <th>Contact</th>
                                <th>NIF</th>
                                <th>Stat</th>
                                <th>RCS</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['customerss'] as $customer) : ?>
            <tr>
                <td>
                    <a href="<?php echo URLROOT; ?>/customers/edit/<?php echo $customer->IDCUSTOMER; ?>" class="btn btn-tazoomcm-edit" title='Modifier' data-toggle='tooltip'><i class='bx bxs-edit'></i></a>
                    <a href="<?php echo URLROOT; ?>/customers/confirmdelete/<?php echo $customer->IDCUSTOMER; ?>" class="btn btn-tazoomcm-delete " title='Supprimer' data-toggle='tooltip'><i class='bx bxs-trash'></i></a></td>
                <td><?php echo $customer->CODECUSTOMER; ?></td>
                <td><?php echo $customer->RAISONSOCIAL; ?></td>
                <td><?php echo $customer->ADRESSE; ?></td>
                <td><?php echo $customer->EMAIL; ?></td>
                <td><?php echo $customer->CONTACT; ?></td>
                <td><?php echo $customer->NIF; ?></td>
                <td><?php echo $customer->STAT; ?></td>
                <td><?php echo $customer->RCS; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</div>
</section>
</main>
</div>
</div>

<?php
require APPROOT . '/views/inc/footer.php';

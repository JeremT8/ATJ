<h1>Liste des adhérents</h1>


<div class="mt-3 mb-3">
    <form method="get">
        <input type="search" name="search" class="form-control" placeholder="taper ici votre recherche" value="<?= $search ?>">
        <input type="hidden" name="page" value="adherent">
        <input type="hidden" name="currentPage" value="<?=$pagination["currentPage"]?>">
    </form>
</div>

<table class="table table-striped table-bordered">
	<thead>

		<th>Nom</th>
		<th>Prenom</th>
		<th>Email</th>
		<th>Date d'adherence</th>


	</thead>
	<tbody>
		<?php foreach ($adherentList as $adherent) : ?>
			<tr>
				<td><?= $adherent->nom ?></td>
				<td><?= $adherent->prenom ?></td>
				<td><?= $adherent->email ?></td>
				<td><?= $adherent->date_souscription ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<nav>
    <ul class="pagination">
        <?php for ($i= 2; $i <= $pagination["numberOfPages"]; $i++): ?>
            <?php $activeClass = $pagination["currentPage"] == $i ? "active": ""; ?>
            <li class="page-item <?=$activeClass?>">
                <a href="<?= getLinkToRoute("adherent", ["currentPage" => $i, "search" => $search])?>"
                class="page-link">
                    <?= $i ?>
                </a>
            </li>
        <?php endfor ?>
    </ul>
</nav>
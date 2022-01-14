<h1>Liste des jeux</h1>


<div class="mt-3 mb-3">
    <form method="get">
        <input type="search" name="search" class="form-control" placeholder="taper ici votre recherche" value="<?= $search ?>">
        <input type="hidden" name="page" value="adherent">
        <input type="hidden" name="currentPage" value="<?=$pagination["currentPage"]?>">
    </form>
</div>

<table class="table table-striped table-bordered">
	<thead>

		<th>Titre</th>
		<th>Editeur</th>
		<th>Disponibilité</th>


	</thead>
	<tbody>
		<?php foreach ($jeuList as $jeu) : ?>
			<tr>
				<td><?= $jeu->titre ?></td>
				<td><?= $jeu->editeur ?></td>
				<td><?= $jeu->disponibilité ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<nav>
    <ul class="pagination">
        <?php for ($i= 2; $i <= $pagination["numberOfPages"]; $i++): ?>
            <?php $activeClass = $pagination["currentPage"] == $i ? "active": ""; ?>
            <li class="page-item <?=$activeClass?>">
                <a href="<?= getLinkToRoute("jeu", ["currentPage" => $i, "search" => $search])?>"
                class="page-link">
                    <?= $i ?>
                </a>
            </li>
        <?php endfor ?>
    </ul>
</nav>
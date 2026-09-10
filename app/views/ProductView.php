<?php
$products = $products ?? [];
$product = $product ?? null;
$form_title = $form_title ?? 'Add product';
$form_action = $form_action ?? site_url('products');
$escape = static function ($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <style>
        :root { --ink: #17211f; --muted: #68736f; --paper: #f5f7f2; --surface: #fff; --line: #dfe7e1; --accent: #176b5b; --danger: #a33d36; }
        * { box-sizing: border-box; }
        body { margin: 0; color: var(--ink); background: radial-gradient(circle at 90% 0, #dcefe6 0, transparent 32%), var(--paper); font-family: "DM Sans", "Segoe UI", sans-serif; }
        .page { width: min(1160px, calc(100% - 32px)); margin: auto; padding: 44px 0 72px; }
        header { display: flex; justify-content: space-between; align-items: end; gap: 20px; margin-bottom: 28px; }
        .eyebrow { margin: 0 0 8px; color: var(--accent); font-size: .72rem; font-weight: 800; letter-spacing: .14em; text-transform: uppercase; }
        h1, h2 { margin: 0; font-family: Georgia, serif; font-weight: 400; } h1 { font-size: clamp(2.5rem, 6vw, 4.6rem); line-height: .95; } h2 { font-size: 1.7rem; }
        a { color: var(--accent); } .logout { color: var(--muted); font-weight: 700; text-decoration: none; }
        .layout { display: grid; grid-template-columns: minmax(260px, 340px) 1fr; gap: 24px; align-items: start; }
        .panel { padding: 24px; border: 1px solid var(--line); border-radius: 8px; background: var(--surface); box-shadow: 0 14px 35px rgba(23,33,31,.06); }
        label { display: block; margin: 17px 0 7px; color: var(--muted); font-size: .78rem; font-weight: 800; letter-spacing: .04em; text-transform: uppercase; }
        input, textarea { width: 100%; padding: 11px 12px; border: 1px solid var(--line); border-radius: 5px; color: var(--ink); background: #fbfdfb; font: inherit; } textarea { min-height: 92px; resize: vertical; }
        button { padding: 11px 15px; border: 0; border-radius: 5px; color: white; background: var(--accent); cursor: pointer; font: inherit; font-weight: 800; } .button-row { display: flex; gap: 10px; margin-top: 20px; align-items: center; } .cancel { color: var(--muted); text-decoration: none; font-weight: 700; }
        .table-wrap { overflow-x: auto; } table { width: 100%; min-width: 650px; border-collapse: collapse; } th, td { padding: 15px 16px; border-bottom: 1px solid var(--line); text-align: left; } th { color: var(--muted); font-size: .7rem; letter-spacing: .08em; text-transform: uppercase; } td { font-size: .93rem; } td:first-child { font-weight: 800; } td:nth-child(3) { white-space: nowrap; } .actions { display: flex; gap: 12px; align-items: center; } .actions a { font-weight: 800; text-decoration: none; } .delete { padding: 0; color: var(--danger); background: transparent; font-size: .9rem; } .empty { padding: 44px 10px; color: var(--muted); text-align: center; }
        @media (max-width: 760px) { .page { padding-top: 30px; } header { align-items: start; flex-direction: column; } .layout { grid-template-columns: 1fr; } .panel { padding: 18px; } }
    </style>
</head>
<body>
    <main class="page">
        <header><div><p class="eyebrow">Authenticated workspace</p><h1>Products</h1></div><a class="logout" href="<?= site_url('logout'); ?>">Log out</a></header>
        <div class="layout">
            <section class="panel">
                <h2><?= $escape($form_title); ?></h2>
                <form method="post" action="<?= $escape($form_action); ?>">
                    <label for="product_name">Product name</label><input id="product_name" name="product_name" maxlength="100" required value="<?= $escape($product['product_name'] ?? ''); ?>">
                    <label for="description">Description</label><textarea id="description" name="description"><?= $escape($product['description'] ?? ''); ?></textarea>
                    <label for="price">Price</label><input id="price" name="price" type="number" min="0" step="0.01" required value="<?= $escape($product['price'] ?? ''); ?>">
                    <label for="quantity">Quantity</label><input id="quantity" name="quantity" type="number" min="0" required value="<?= $escape($product['quantity'] ?? '0'); ?>">
                    <div class="button-row"><button type="submit"><?= $product ? 'Save changes' : 'Add product'; ?></button><?php if ($product): ?><a class="cancel" href="<?= site_url('products'); ?>">Cancel</a><?php endif; ?></div>
                </form>
            </section>
            <section class="panel">
                <h2>Inventory</h2>
                <?php if (empty($products)): ?><div class="empty">No products yet. Add the first one using the form.</div><?php else: ?><div class="table-wrap"><table><thead><tr><th>Name</th><th>Description</th><th>Price</th><th>Quantity</th><th>Actions</th></tr></thead><tbody>
                    <?php foreach ($products as $item): ?><tr><td><?= $escape($item['product_name']); ?></td><td><?= $escape($item['description']); ?></td><td><?= number_format((float) $item['price'], 2); ?></td><td><?= (int) $item['quantity']; ?></td><td class="actions"><a href="<?= site_url('products/edit/' . (int) $item['id']); ?>">Update</a><form method="post" action="<?= site_url('products/delete/' . (int) $item['id']); ?>" onsubmit="return confirm('Delete this product?');"><button class="delete" type="submit">Delete</button></form></td></tr><?php endforeach; ?>
                </tbody></table></div><?php endif; ?>
            </section>
        </div>
    </main>
</body>
</html>
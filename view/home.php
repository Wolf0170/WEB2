<style>
    /* Headline */
.headline {
  text-align: center;
  margin: 20px auto;
}

.headline .section-title {
  font-size: 24px;
  font-weight: bold;
  color: #000;
  text-transform: uppercase;
  display: inline-block;
}

.headline .header-underline {
  width: 200px;
  height: 3px;
  background-color: #f37319;
  margin: 5px auto 0;
}
/* Products */
.products {
  list-style-type: none;
  padding: 0;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  gap: 20px;
  flex-wrap: wrap;
}

.products-item {
  text-align: center;
  border-radius: 8px;
  width: calc(25% - 20px);
  background-color: #fff;
  overflow: hidden;
  margin-bottom: 20px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  flex-direction: column;
}

.products-item:hover {
  transform: translateY(-10px);
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.product-thumb img {
  width: 100%;
  height: 170px;
  object-fit: cover;
  transition: transform 0.3s ease;
}

.product-thumb:hover img {
  transform: scale(1.1);
}

.product-info {
  padding: 10px;
  flex-grow: 1;
}

.product-name {
  font-size: 18px;
  text-decoration: none;
  font-weight: bold;
  color: black;
  margin-bottom: 5px;
}

.product-price {
  font-size: 24px;
  margin-bottom: 10px;
}

.product-price .price {
  font-size: 19px;
  font-weight: bold;
  color: red;
}
.currency {
  font-size: 18px;
  vertical-align: top;
}

input[type="submit"] {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  background-color: #f37319;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 20px;
  cursor: pointer;
  width: 100%;
  text-align: center;
  font-size: 16px;
  font-weight: bold;
  transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
  background-color: #f37319;
}

/* pagination */
.pagination {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0;
  list-style: none;
}
.product_pagination {
  margin-bottom: 30px;
}
.pagination_item {
  margin: 0 6px;
}
.pagination_item_link {
  display: block;
  text-decoration: none;
  color: #939393;
  font-weight: 400;
  font-size: 1.2rem;
  min-width: 35px;
  height: 35px;
  text-align: center;
  line-height: 35px;
  border-radius: 5px;
  border: 1px solid #ddd;
  transition: 0.3s;
}
.pagination_item_link:hover {
  background-color: #f37319;
  color: white;
}
.pagination_active .pagination_item_link {
  background-color: #f37319;
  color: white;
  font-weight: bold;
}
.pagination_active .pagination_item_link:hover {
  background-color: #ea7f1f;
}

</style>
<section>
    <div id="wrapper">
        <div class="headline">
            <div class="section-title">Khám phá thực đơn của chúng tôi</div>
            <div class="header-underline"></div>
        </div>
    </div>

<div class="products">
 <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
            <div class="products-item">
                <div class="product-top">
                    <a href="#t<?= $product['MaSP'] ?>" class="product-thumb">
                        <img src="../view/img/product/<?= htmlspecialchars($product['HinhAnh']) ?>" alt="<?= htmlspecialchars($product['TenSP']) ?>">
                    </a>
                </div>
                <div class="product-info">
                    <a href="#" class="product-name"><?= htmlspecialchars($product['TenSP']) ?></a>
                    <div class="product-price">
                        <span class="price"><?= number_format($product['DonGia'], 0, ',', '.') ?><span class="currency">đ</span></span>
                    </div>
                    <form action="index.php?act=cart" method="post">
                        <input type="hidden" name="tensp" value="<?= htmlspecialchars($product['TenSP']) ?>">
                        <input type="hidden" name="gia" value="<?= $product['DonGia'] ?>">
                        <input type="hidden" name="hinh" value="<?= htmlspecialchars($product['HinhAnh']) ?>">
                        <input type="submit" name="addcart" value="Đặt hàng">
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Không có sản phẩm nào!</p>
    <?php endif; ?>
</div>

<ul class="pagination product_pagination">
    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <li class="pagination_item <?= ($page == $i ? 'pagination_active' : '') ?>">
            <a href="../controller/index.php?page=<?= $i ?>" class="pagination_item_link">
                <?= $i ?>
            </a>
        </li>
    <?php endfor; ?>
</ul>

</section>


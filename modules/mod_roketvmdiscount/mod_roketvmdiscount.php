<?php
/**
* RoketQA module
* @package RoketVMDiscount
* @Copyright (C) 2011 Pavel Gryazev, All Rights Reserved
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
* @link http://roket.kiev.ua
* @author Gryazev P. N.
**/
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); 

global $mosConfig_absolute_path;

if( file_exists(dirname(__FILE__).'/../../components/com_virtuemart/virtuemart_parser.php' )) {
	require_once( dirname(__FILE__).'/../../components/com_virtuemart/virtuemart_parser.php' );
} else {
	require_once( dirname(__FILE__).'/../components/com_virtuemart/virtuemart_parser.php' );
}

if( empty($max_items))
  $max_items = $params->get( 'max_items', 2 ); 
if( empty($category_id))
  $category_id = (int)$params->get( 'category_id', 0 ); 
if( empty($display_style))
  $display_style = $params->get( 'display_style', "vertical" ); 
if( empty($products_per_row))
  $products_per_row = $params->get( 'products_per_row', 4 ); 
if( empty($show_price))
  $show_price = (bool)$params->get( 'show_price', 1 ); 
if( empty($show_addtocart))
  $show_addtocart = (bool)$params->get( 'show_addtocart', 1 ); 
if( empty($type_show))
$type_show = $params->get( 'type_show', "rand" );

require_once( CLASSPATH. 'ps_product.php');
$ps_product = new ps_product;
$db=new ps_DB;
if ( $category_id ) {
	$q  = "SELECT DISTINCT product_sku,product_discount_id FROM #__{vm}_product, #__{vm}_product_category_xref, #__{vm}_category WHERE ";
	$q .= "product_parent_id=''";
	$q .= "AND #__{vm}_product.product_id=#__{vm}_product_category_xref.product_id ";
	$q .= "AND #__{vm}_category.category_id=#__{vm}_product_category_xref.category_id ";
	$q .= "AND #__{vm}_category.category_id='$category_id'";
	$q .= "AND #__{vm}_product.product_publish='Y' ";
	if( CHECK_STOCK && PSHOP_SHOW_OUT_OF_STOCK_PRODUCTS != "1") {
		$q .= " AND product_in_stock > 0 ";
	}
  $q .= "ORDER BY product_name";
}
else {
	$q  = "SELECT DISTINCT product_sku,product_discount_id FROM #__{vm}_product WHERE ";
	$q .= "product_parent_id='' AND vendor_id='".$_SESSION['ps_vendor_id']."' ";
	$q .= "AND #__{vm}_product.product_publish='Y' ";
	if( CHECK_STOCK && PSHOP_SHOW_OUT_OF_STOCK_PRODUCTS != "1") {
		$q .= " AND product_in_stock > 0 ";
	}
	$q .= "ORDER BY product_name";
}
$db->query($q);

$i=0;
while($db->next_record()){
	
  if($db->f("product_discount_id") == 0)
  {
  }
  else
  {
  $prodlist[$i]=$db->f("product_sku");
  $i++;
  }
}

if($db->num_rows() == 0) {
	return;
} ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <?php

srand ((double) microtime() * 10000000);
if($type_show == "rand")
{
if (sizeof($prodlist) < $max_items) {
    $max_items = sizeof($prodlist);
}
if (sizeof($prodlist)>1) {
    $rand_prods = array_rand ($prodlist, $max_items);
} else {
  	$rand_prods = rand (4545.3545, $max_items);
}
}
else
{
	
if (sizeof($prodlist) < $max_items) {
    $max_items = sizeof($prodlist);
}
if (sizeof($prodlist)>1) {
	if($max_items == "1")
	{
		$rand_prods == 0;
	}
	else
	{
		$max_items_2 = $max_items - 1;
		$i_2 = 0;
		while($max_items_2 >= $i_2)
		{
    		$rand_prods[] = $i_2;
			$i_2++;
		}
	}
} 
else 
{
  	$rand_prods = rand (4545.3545, $max_items);
}
	
}

if ($max_items==1) { 
		?>
        <tr align="center" class="sectiontableentry1">
			<td><?php $ps_product->show_snapshot($prodlist[$rand_prods], $show_price, $show_addtocart);  ?><br />
			</td>
		</tr><?php
}
else { 
	for($i=0; $i<$max_items; $i++) {
		$sectioncolor = $i%2 ? 'sectiontableentry2' : 'sectiontableentry1';
        if( $display_style == "vertical" ) {
        	?>
			<tr align="center" class="<?php echo $sectioncolor ?>">
				<td><?php $ps_product->show_snapshot($prodlist[$rand_prods[$i]], $show_price, $show_addtocart); ?><br />
				</td>
			</tr><?php
        }
        elseif( $display_style== "horizontal" ) {
        	if( $i == 0 ) {
        		echo "<tr>\n";
        	}
            echo "<td align=\"center\">";
            $ps_product->show_snapshot($prodlist[$rand_prods[$i]], $show_price, $show_addtocart);
            echo "</td>\n";
            if( ($i+1) == $max_items ) {
            	echo "</tr>\n";
          	}
        }
		elseif( $display_style== "table" ) {
			if( $i == 0 ) {
            	echo "<tr>\n";
            }
            echo "<td align=\"center\">";
            $ps_product->show_snapshot($prodlist[$rand_prods[$i]], $show_price, $show_addtocart);
            echo "</td>\n";
          	if( ($i+1) == $max_items ) {
            	echo "</tr>\n";
          	} elseif( ($i+1) % $products_per_row == 0) {
          		echo "</tr><tr>\n";
          	}  
        }
	}
}
?>
</table></br><span><a style=" font-size:9px; color:#999999 !important;" href="http://roket.kiev.ua">Roket-life</a></span>
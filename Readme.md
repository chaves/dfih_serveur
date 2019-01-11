https://sagalbot.github.io/vue-sortable/

https://www.rebasedata.com/convert-sqlite-to-mysql-online

Select material, listing_id, shop_id
FROM pivot
LEFT JOIN materials_dic on materials_dic.id = pivot.material_id

Select material, COUNT(pivot.id) as total, listing_id, shop_id
FROM pivot
LEFT JOIN materials_dic on materials_dic.id = pivot.material_id
GROUP BY material
ORDER total Desc
LIMIT 1000

Select material, COUNT(pivot.id), listing_id, shop_id
FROM pivot
LEFT JOIN materials_dic on materials_dic.id = pivot.material_id
GROUP BY material
ORDER COUNT(pivot.id) DESC
LIMIT 1000

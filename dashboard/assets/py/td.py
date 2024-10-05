# x = "name, description, brand, categories, tax, tags, price, specialPrice, sku, stock, media, attributes, metaTitle, metaDescription, status, virtual".split(',')
x = "customerName, customerEmail, status, total, productsId, usersId"


# <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Project</th>


with open("output.txt", 'w') as file:
    for s in x.split(','):
        file.write(f'<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{s.strip()}</th>\n')
    for s in x.split(','):
        file.write('echo "' + f"<td>{{$row['{s.strip()}']}}</td>" + '";\n')
 

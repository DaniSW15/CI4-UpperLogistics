<?php

namespace App\Controllers;

use App\Models\ArticleModel;

class ArticleController extends BaseController
{
    public function index()
    {
        // Cargar los artículos desde la base de datos
        $articleModel = new ArticleModel();
        $data['articles'] = $articleModel->findAll();


        // Limitar la longitud de la descripción a 350 caracteres
        foreach ($data['articles'] as $key => $article) {
            $description = mb_substr($article['meta_description'], 0, 150);
            // Agregar "..." solo si la descripción original es más larga que 150 caracteres
            if (mb_strlen($article['meta_description']) > 150) {
                $description .= '...';
            }
            // Actualizar la descripción en el arreglo de artículos
            $data['articles'][$key]['meta_description'] = $description;
        }

        // Cargar la vista con los datos
        return view('articles', $data);
    }

    public function showCreateForm()
    {
        // Aquí puedes cargar la vista que contiene el formulario para crear un nuevo artículo
        return view('create_article_form');
    }

    public function create()
    {
        // Definir las reglas de validación
        $rules = [
            'meta_title' => 'required|min_length[3]|max_length[255]',
            'meta_description' => 'required|min_length[3]',
            'title' => 'required|min_length[3]',
            'description' => 'required|min_length[3]',
            'image' => 'uploaded[image]|max_size[image,1024]|is_image[image]',
            'article_content' => 'required|min_length[3]',
            'publish_date' => 'required|valid_date'
        ];

        // Ejecutar la validación
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Obtener los datos del formulario
        $meta_title = $this->request->getPost('meta_title');
        $meta_description = $this->request->getPost('meta_description');
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        $image = $this->request->getFile('image');
        $article_content = $this->request->getPost('article_content');
        $publish_date = $this->request->getPost('publish_date');

        // Guardar la imagen en la carpeta uploads
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move('uploads/', $newName);
        }

        // Guardar los datos en la base de datos
        $articleModel = new ArticleModel();
        $articleModel->save([
            'meta_title' => $meta_title,
            'meta_description' => $meta_description,
            'title' => $title,
            'description' => $description,
            'image' => $newName,
            'article_content' => $article_content,
            'publish_date' => $publish_date
        ]);

        // Redireccionar a la lista de artículos
        return redirect()->to('/');
    }

    public function detalis($id)
    {
        // Cargar el artículo desde la base de datos
        $articleModel = new ArticleModel();
        $data['article'] = $articleModel->find($id);

        // Cargar la vista con los datos
        return view('article_details', $data);
    }

    public function edit($id)
    {
        // Cargar el artículo desde la base de datos
        $articleModel = new ArticleModel();
        $data['article'] = $articleModel->find($id);

        // Cargar la vista con los datos
        return view('edit_article_form', $data);
    }

    public function update($id)
    {
        // Definir las reglas de validación
        $rules = [
            'meta_title' => 'required|min_length[3]|max_length[255]',
            'meta_description' => 'required|min_length[3]',
            'title' => 'required|min_length[3]',
            'description' => 'required|min_length[3]',
            'image' => 'max_size[image,1024]|is_image[image]',
            'article_content' => 'required|min_length[3]',
            'publish_date' => 'required|valid_date'
        ];

        // Ejecutar la validación
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Obtener los datos del formulario
        $meta_title = $this->request->getPost('meta_title');
        $meta_description = $this->request->getPost('meta_description');
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        $image = $this->request->getFile('image');
        $article_content = $this->request->getPost('article_content');
        $publish_date = $this->request->getPost('publish_date');

        // Cargar el artículo desde la base de datos
        $articleModel = new ArticleModel();
        $article = $articleModel->find($id);

        // Guardar la imagen en la carpeta uploads
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move('uploads/', $newName);
            // Eliminar la imagen anterior
            unlink('uploads/' . $article['image']);
        } else {
            $newName = $article['image'];
        }

        // Actualizar los datos en la base de datos
        $articleModel->update($id, [
            'meta_title' => $meta_title,
            'meta_description' => $meta_description,
            'title' => $title,
            'description' => $description,
            'image' => $newName,
            'article_content' => $article_content,
            'publish_date' => $publish_date
        ]);

        // Redireccionar a la lista de artículos
        return redirect()->to('/');
    }

    public function delete($id)
    {
        // Cargar el artículo desde la base de datos
        $articleModel = new ArticleModel();
        $article = $articleModel->find($id);

        // Eliminar la imagen del servidor
        unlink('uploads/' . $article['image']);

        // Eliminar el artículo de la base de datos
        $articleModel->delete($id);

        // Redireccionar a la lista de artículos
        return redirect()->to('/');
    }
}

<?php

namespace AppBundle\Controller\AdminControllers;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;


class ImageUploadController extends Controller /*implements TokenAuthenticatedController*/
{

    /**
     * @Route("/image-upload", name="imageUpload")
     */
    public function uploadImageAction(Request $request)
    {

        $image = $request->files->get('image');

        $originalName = $image->getClientOriginalName();
        $name_array = explode('.',$originalName);

        $fileName = md5(uniqid()).'.'.$image->guessExtension();
        $image->move(
            $this->getParameter('save_image'),
            $originalName
        );

        return $this->redirectToRoute('add-product');

    }

}
<?php
namespace App\Controller;

use App\Entity\Cast;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
  /**
   * @Route("/admin", name="admin")
   */
  public function admin()
  {
    return $this->render('admin/admin.html.twig', [
      'title' => 'Admin',
      'message' => '管理者 page',
      'user' => $this->getUser(),
    ]);
  }
}
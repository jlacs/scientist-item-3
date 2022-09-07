<?php

namespace App\Http\Controllers;

use App\Entities\Theories;
use App\Entities\Scientist;
use Illuminate\Http\Request;
use Doctrine\ORM\EntityManagerInterface;


class TheoriesController extends Controller
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function deleteTheory(Request $request)
    {
        $theory = $this->em->getRepository(Theories::class)->find($request->id);

        $this->em->remove($theory);
        $this->em->flush();

        return response()->json(['success' => true]);
    }
}
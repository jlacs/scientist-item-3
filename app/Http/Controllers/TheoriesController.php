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

    public function editTheory(Request $request)
    {
        $theory = $this->em->getRepository(Theories::class)->find($request->id);
 
        return response()->json([
            'id' => $theory->getId(),
            'theory' => $theory->getTitle()
        ]);
    }

    public function deleteTheory(Request $request)
    {
        $theory = $this->em->getRepository(Theories::class)->find($request->id);

        $this->em->remove($theory);
        $this->em->flush();

        redirect('scientist')->with('success_message', 'Theory deleted successfully!');

        return response()->json(['success' => true]);
    }
}

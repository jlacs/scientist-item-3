<?php

namespace App\Http\Controllers;

use App\Entities\Theories;
use App\Entities\Scientist;
use Illuminate\Http\Request;
use Doctrine\ORM\EntityManagerInterface;

class ScientistController extends Controller
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function index()
    {
        $scientists = $this->em->getRepository(Scientist::class)->findAll();

        return view('scientist', [
            'scientists' => $scientists,
        ]);
    }

    public function edit(Request $request)
    {
        $scientist = $this->em->getRepository(Scientist::class)->find($request->id);
 
        return response()->json([
            'id' => $scientist->getId()
        ]);
    }

    public function addScientist(Request $request)
    {
        $scientist = new Scientist(
            $request->firstname,
            $request->lastname
        );

        $scientist->addTheory(
            new Theories($request->theory)
        );    

        $this->em->persist($scientist);
        $this->em->flush();

        redirect('scientist')->with('success_message', 'Scientist added successfully!');

        return response()->json(['success' => true]);
    }

    public function addTheory(Request $request)
    {
        $scientist = $this->em->getRepository(Scientist::class)->find($request->id);

        $scientist->addTheory(
            new Theories($request->theory)
        );

        $this->em->persist($scientist);
        $this->em->flush();

        return response()->json(['success' => true]);
    }

    public function deleteScientist(Request $request)
    {
        $scientist = $this->em->getRepository(Scientist::class)->find($request->id);

        $this->em->remove($scientist);
        $this->em->flush();

        redirect('scientist')->with('success_message', 'Scientist deleted successfully!');

        return response()->json(['success' => true]);
    }
}

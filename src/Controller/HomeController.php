<?php

namespace App\Controller;

use App\Services\TeamsInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'someVariable' => 'NFQ Akademija',
        ]);
    }

    /**
     * @Route("/member/{member}", name="member")
     * @param TeamsInterface $teams
     * @param string $member
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function member(TeamsInterface $teams, string $member = "")
    {
        return $this->render('home/member.html.twig', [
           'member' =>  $member,
            'team' => $teams->getTeamByMember($member)
        ]);
    }
}

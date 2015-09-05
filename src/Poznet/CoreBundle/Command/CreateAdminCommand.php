<?php
namespace Poznet\CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Poznet\CoreBundle\Entity\user;
 
 
class CreateAdminCommand extends ContainerAwareCommand {

    protected function configure()
    {
        $this
            ->setName('sf2core:admin:create')
            ->setDescription('Changing Admin Password');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();
        $user=$em->getRepository('CoreBundle:user')->findOneBy(array('Username'=>'admin'));
        if(!$user){
             $user=new user();
             $factory = $this->getContainer()->get('security.encoder_factory');
            try{
                $encoder = $factory->getEncoder($user);       
                $encoded = $encoder->encodePassword('admin', $user->getSalt());
                $user->setPassword($encoded);
                $user->setEmail('me@me.com');
                $user->setUsername('admin');
                $em->flush();
            } catch(\RuntimeException $e) {
          //its  very  lame :)
        
            }    
            
            $output->writeln('Konto Założone');
        }else{
            $output->writeln('Admin Juz Istnieje ');
        }
        $output->writeln('Done');

    }
}

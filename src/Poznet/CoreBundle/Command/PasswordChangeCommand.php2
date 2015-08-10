<?php
namespace Poznet\CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
 
 
class PasswordChangeCommand extends ContainerAwareCommand {

    protected function configure()
    {
        $this
            ->setName('sf2core:admin:password')
            ->setDescription('Changing Admin Password');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();
        $dialog = $this->getHelper('dialog');
        $password = $dialog->askHiddenResponse(
            $output,
            'New Admin Password ?',
            false);
        $user=$em->getRepository('CoreBundle:user')->findOneBy(array('Username'=>'admin'));
        if($user){
             $factory = $this->getContainer()->get('security.encoder_factory');
            try{
                $encoder = $factory->getEncoder($user);       
                $encoded = $encoder->encodePassword($password, $user->getSalt());
                $user->setPassword($encoded);
                $em->flush();
            } catch(\RuntimeException $e) {
          //its  very  lame :)
        
            }    
            
            $output->writeln('Password Changed');    
        }else{
            $output->writeln('Wrong User');    
        }
        $output->writeln('Done');

    }
}

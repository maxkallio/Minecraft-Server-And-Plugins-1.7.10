import org.bukkit.Bukkit;
import org.bukkit.ChatColor;
import org.bukkit.command.Command;
import org.bukkit.command.CommandSender;
import org.bukkit.entity.Player;
import org.bukkit.plugin.java.JavaPlugin;

public class DonationHandler extends JavaPlugin {
    @Override
    public boolean onCommand(CommandSender sender, Command cmd, String label, String[] args) {
        if (cmd.getName().equalsIgnoreCase("donate")) {
            if (sender instanceof Player) {
                Player player = (Player) sender;
                if (args.length < 2) {
                    player.sendMessage(ChatColor.RED + "Usage: /donate <amount> <rank>");
                    return true;
                }
                double amount = Double.parseDouble(args[0]);
                String rank = args[1];

                Bukkit.dispatchCommand(Bukkit.getConsoleSender(), "pex user " + player.getName() + " group set " + rank);
                player.sendMessage(ChatColor.GREEN + "Thank you for donating! You are now " + rank);
            }
            return true;
        }
        return false;
    }
}

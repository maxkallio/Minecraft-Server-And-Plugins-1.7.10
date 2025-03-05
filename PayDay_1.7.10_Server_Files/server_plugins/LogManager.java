import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.text.SimpleDateFormat;
import java.util.Date;
import org.bukkit.plugin.java.JavaPlugin;

public class LogManager {
    private static final String LOG_FOLDER = "logs/";
    private JavaPlugin plugin;

    public LogManager(JavaPlugin plugin) {
        this.plugin = plugin;
    }

    public void logEvent(String message) {
        try {
            File logFolder = new File(plugin.getDataFolder(), LOG_FOLDER);
            if (!logFolder.exists()) {
                logFolder.mkdirs();
            }
            String fileName = new SimpleDateFormat("yyyy-MM-dd").format(new Date()) + ".log";
            File logFile = new File(logFolder, fileName);

            try (BufferedWriter writer = new BufferedWriter(new FileWriter(logFile, true))) {
                writer.write("[" + new SimpleDateFormat("HH:mm:ss").format(new Date()) + "] " + message);
                writer.newLine();
            }
        } catch (IOException e) {
            plugin.getLogger().severe("Failed to write log: " + e.getMessage());
        }
    }
}
